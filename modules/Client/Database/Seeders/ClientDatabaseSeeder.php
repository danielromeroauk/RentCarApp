<?php namespace Modules\Client\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ClientDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->countriesSeeder();
	}

    private function countriesSeeder() {
        \DB::table('countries')->insert(array(
            'name' => 'España',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        \DB::table('countries')->insert(array(
            'name' => 'Italia',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
    }

}