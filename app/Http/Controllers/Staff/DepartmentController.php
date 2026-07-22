<?php

namespace App\Http\Controllers\Staff;


use App\Models\User;
use Inertia\Inertia;
use App\Models\Portal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Concerns\PasswordValidationRules;
use App\Concerns\ProfileValidationRules;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use App\Enums\AdminEnum;
use Illuminate\Support\Facades\Hash;

class DepartmentController extends Controller
{
    use PasswordValidationRules, ProfileValidationRules;
    
    
    public function index()
    {
        $excluded = Portal::query()->where('slug', 'customers')->first();

        $props = [
            'portals'       => Portal::all() ?? null,
            'roles'         => Role::all() ?? null,
            'permissions'   => Permission::all() ?? null,
            'staffing'         => User::query()->where('portal_id', '!=', (int)$excluded->id)->with('roles', 'permissions')->get() ?? null,
        ];

        return Inertia::render('admin/staff', $props);
    }

    public function store(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'portal_id' => ['required', 'exists:portals,id'],
            'role' => ['required', 'exists:roles,id'],
            'permissions' => ['array'],
        ])->validate();

        
        $user = User::create([
            'portal_id' => $request->input('portal_id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make(AdminEnum::DEFAULTPASSWORD->value()),
        ]);

        $role = Role::find($request->input('role'));
        $user->assignRole($role);


        $permissions = [];
        foreach ($request->input('permissions', []) as $permissionId) {
            $permission = Permission::find($permissionId);
            if ($permission) {
                $permissions[] = $permission->name;
            }
        }

        $user->syncPermissions($permissions);
        // return $this->index();
        Inertia::flash('toast', ['type' => 'success', 'message' => __("Staff created successfully")]);
        return to_route('staff.index');
    }

    public function roles(Request $request)
    {
        $validated = Validator::make($request->all(), [
            
            'role_name' => ['required'],
        ])->validate();

        Role::create(['name' => $validated['role_name']]);
    }


    public function permissions(Request $request) 
    {
        $validated  = Validator::make($request->all(), [
            
            'portal_id' => ['required', 'exists:portals,id'],
        ])->validate();

        Permission::create(['name' => $validated['permission_name']]);

    }

}
