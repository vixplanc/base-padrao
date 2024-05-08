<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Vixplanc\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $dev1 = User::factory()->create(
            [
                'name' => '55006396',
                'email' => 'jancarlolcj@example.com',
                'password' => '$2y$12$sUv13Nvf3FCZc4shyCU4bOWfJC9l58tXuQ3W1M2kAz2AvHW88HxzC',
                // 'isAdmin' => 1,
            ],
        );
        $dev2 = User::factory()->create(
            [
                'name' => '55017168',
                'email' => 'VictorMielke@example.com',
                'password' => '$2y$12$sUv13Nvf3FCZc4shyCU4bOWfJC9l58tXuQ3W1M2kAz2AvHW88HxzC',
                // 'isAdmin' => 1,
            ],
        );
        $n_users = 100;
        $count = $n_users;
        $users = [];
        while($count > 0){
            $users[] = User::factory()->create(
                [
                    'name' => fake()->name(),
                    'email' => fake()->email(),
                    'password' => '$2y$12$sUv13Nvf3FCZc4shyCU4bOWfJC9l58tXuQ3W1M2kAz2AvHW88HxzC',
                    // 'isAdmin' => 1,
                ],
            );
            $count -= 1;
        }
        // $apoio1 = User::factory()->create(
        //     [
        //         'name' => '55001111',
        //         'email' => 'apoio@example.com',
        //         'password' => '$2y$12$sUv13Nvf3FCZc4shyCU4bOWfJC9l58tXuQ3W1M2kAz2AvHW88HxzC',
        //     ],
        // );
        // $deposito1 = User::factory()->create(
        //     [
        //         'name' => '55002222',
        //         'email' => 'deposito@example.com',
        //         'password' => '$2y$12$sUv13Nvf3FCZc4shyCU4bOWfJC9l58tXuQ3W1M2kAz2AvHW88HxzC',
        //     ],
        // );


        // $deadline = DeadLine::factory()->create(["process"=>"sep_sis","hours"=>18]);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Permission::create(['name' => 'insert-demand']);
        // Permission::create(['name' => 'edit-demand']);
        // Permission::create(['name' => 'close-demand']);

        // Permission::create(['name' => 'insert-item']);
        // Permission::create(['name' => 'edit-item']);
        // Permission::create(['name' => 'change-item']);

        // Permission::create(['name' => 'insert-rdo']);
        // Permission::create(['name' => 'edit-rdo']);
        // Permission::create(['name' => 'close-rdo']);

        // Permission::create(['name' => 'insert-check']);
        // Permission::create(['name' => 'remove-check']);

        Permission::create(['name' => 'active-user']);

        Permission::create(['name'=>'set-role']);
        Permission::create(['name'=>'remove-role']);

        Permission::create(['name'=>'set-active-user']);
        Permission::create(['name'=>'remove-active-user']);

        Permission::create(['name'=>'reset-password-user']);

        // $role_apoio = Role::create(['name' => 'apoio'])
        //     ->givePermissionTo(
        //         [
        //             'insert-demand',
        //             'edit-demand',
        //             'close-demand',
        //             'insert-rdo',
        //             'edit-rdo',
        //             'close-rdo',
        //             'insert-check',
        //             'remove-check',
        //             'edit-item',
        //         ]
        //     );

        // $role_deposito = Role::create(['name' => 'depoisto'])
        //     ->givePermissionTo(
        //         [
        //             'insert-rdo',
        //             'close-rdo',
        //             'edit-item',
        //         ]
        //     );

        $role_admin = Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::all());

        foreach ($users as $user) {
            $user->givePermissionTo('active-user');
        }
        $admins = fake()->randomElements($users,$n_users*0,1);
        foreach ($admins as $admin) {
            $admin->assignRole($role_admin);
        }

        $dev1->givePermissionTo('active-user');
        $dev1->assignRole($role_admin);

        $dev2->givePermissionTo('active-user');
        $dev2->assignRole($role_admin);

        // $apoio1->givePermissionTo('active-user');
        // $apoio1->assignRole($role_apoio);

        // $deposito1->givePermissionTo('active-user');
        // $apoio1->assignRole($role_deposito);
    }
}
