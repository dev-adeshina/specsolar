<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $superAdmin = Role::firstOrCreate([
            'name' => 'super-admin',
            'guard_name' => 'web',
        ]);

        $admin = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        $engineer = Role::firstOrCreate([
            'name' => 'engineer',
            'guard_name' => 'web',
        ]);

        $cashier = Role::firstOrCreate([
            'name' => 'cashier',
            'guard_name' => 'web',
        ]);

        $customerService = Role::firstOrCreate([
            'name' => 'customer-service',
            'guard_name' => 'web',
        ]);

        $customer = Role::firstOrCreate([
            'name' => 'customer',
            'guard_name' => 'web',
        ]);

        // Admin permissions
        $admin->givePermissionTo([
            'staff.view',
            'staff.create',
            'staff.edit',
            'staff.delete',

            'customer.view',

            'report.view',

            'settings.manage',
        ]);

        // Engineer permissions
        $engineer->givePermissionTo([
            'inventory.view',
            'inventory.edit',

            'menu.view',
        ]);

        // Cashier permissions
        $cashier->givePermissionTo([
            'order.view',
            'order.edit',
        ]);

        // Customer Service permissions
        $customerService->givePermissionTo([
            'customer.view',
            'customer.edit',

            'order.view',
        ]);

        // Customer permissions
        $customer->givePermissionTo([
            'order.create',
            'order.view',
        ]);

        // Give every permission to Super Admin
        $superAdmin->syncPermissions(Permission::all());
    }
}
