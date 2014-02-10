<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('CodigosTableSeeder');
    	$this->call('EquiposTableSeeder');
	}

}