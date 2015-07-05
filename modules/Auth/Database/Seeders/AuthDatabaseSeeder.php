<?php namespace Modules\Auth\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AuthDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->permissionsSeeder();
		$this->rolesSeeder();
        $this->permissionRoleSeeder();
        $this->permissionsAllSeeder();
		$this->usersSeeder();
		$this->roleUserSeeder();
	}

	private function permissionsSeeder(){

		DB::table('permissions')->insert(array(
            'name' => 'create-users',
            'display_name' => 'Create Users',
            'description' => 'Create users',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

		DB::table('permissions')->insert(array(
            'name' => 'read-users',
            'display_name' => 'Read Users',
            'description' => 'List Users',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('permissions')->insert(array(
            'name' => 'update-users',
            'display_name' => 'Update Users',
            'description' => 'Update Users',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('permissions')->insert(array(
            'name' => 'delete-users',
            'display_name' => 'Delete Users',
            'description' => 'Delete Users',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
	}

    private function permissionsAllSeeder(){

        $name = 'Tables_in_'.env('DB_DATABASE', 'forge');
        $data = DB::select('SHOW TABLES WHERE '.$name.' NOT REGEXP "[[.low-line.]]"');

        foreach($data as $value) {

            if(($value->$name != 'users') && ($value->$name != 'migrations')) {
                DB::table('permissions')->insert(array(
                    'name' => 'create-'.$value->$name,
                    'display_name' => 'Create '.ucwords($value->$name),
                    'description' => 'Create '.ucwords($value->$name),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ));

                DB::table('permissions')->insert(array(
                    'name' => 'read-'.$value->$name,
                    'display_name' => 'Read '.$value->$name,
                    'description' => 'List '.$value->$name,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ));

                DB::table('permissions')->insert(array(
                    'name' => 'update-'.$value->$name,
                    'display_name' => 'Update '.ucwords($value->$name),
                    'description' => 'Update '.ucwords($value->$name),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ));

                DB::table('permissions')->insert(array(
                    'name' => 'delete-'.$value->$name,
                    'display_name' => 'Delete '.ucwords($value->$name),
                    'description' => 'Delete '.ucwords($value->$name),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ));
            }
        }
    }

	private function rolesSeeder(){

		DB::table('roles')->insert(array(
            'name' => 'admin',
            'display_name' => 'Administrador',
            'description' => 'Administra los módulos de usuarios',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
	}

    private function permissionRoleSeeder(){

        for($i=1; $i < 5; $i++){
            DB::table('permission_role')->insert(array(
                'permission_id' => $i,
                'role_id' => 1
            ));
        }
    }

	private function usersSeeder(){

		DB::table('users')->insert(array(
            'firstname' => 'Jose',
            'lastname' => 'Perez Lopez',
            'email' => 'admin@lara.app',
            'password' => \Hash::make('admin123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
	}

    private function roleUserSeeder(){

            DB::table('role_user')->insert(array(
                'user_id' => 1,
                'role_id' => 1
            ));
    }

}