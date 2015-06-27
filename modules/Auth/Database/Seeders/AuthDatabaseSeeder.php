<?php namespace Modules\Auth\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
		$this->usersSeeder();
	}

	private function permissionsSeeder(){

		\DB::table('permissions')->insert(array(
            'name' => 'create',
            'display_name' => 'Create',
            'description' => 'Create users',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

		\DB::table('permissions')->insert(array(
            'name' => 'read',
            'display_name' => 'Read',
            'description' => 'List users',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        \DB::table('permissions')->insert(array(
            'name' => 'update',
            'display_name' => 'Update',
            'description' => 'Update users',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        \DB::table('permissions')->insert(array(
            'name' => 'delete',
            'display_name' => 'Delete',
            'description' => 'Delete users',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
	}

	private function rolesSeeder(){

		\DB::table('roles')->insert(array(
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'Administrator have all permissions',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
	}

	private function usersSeeder(){

		\DB::table('users')->insert(array(
            'firstname' => 'Jose',
            'lastname' => 'Perez Lopez',
            'email' => 'joselopez@yahoo.es',
            'password' => \Hash::make('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
	}

}