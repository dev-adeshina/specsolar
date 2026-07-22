<?php

namespace App\Actions\Fortify;

use App\Concerns\PasswordValidationRules;
use App\Concerns\ProfileValidationRules;
use App\Models\User;
use App\Models\Portal;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules, ProfileValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            ...$this->profileRules(),
            'password' => $this->passwordRules(),
            'phone' => ['required', 'string']
        ])->validate();

        $user = User::create([
            'portal_id' =>  $this->checkIfAdminExist() ? (int)Portal::where('slug', 'customers')->first()->id : (int)Portal::where('slug',  'admin')->first()->id,
            'name' => $input['name'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => $input['password'],
        ]);

        $result = $this->checkIfPortalIsAdmin($user);
        return $result;
    }

    public function checkIfAdminExist()
    {
        $admin = User::where('portal_id', (int)Portal::where('slug', 'admin')->first()->id)->first();
        if ($admin) {
            return true;
        }
        return false;
    }

    public function checkIfPortalIsAdmin(User $user)
    {
        if($user->portal->slug === 'admin') {
            $user->assignRole('super-admin');
        } else {
            $user->assignRole('customer');
        }
        return $user;
    }
}