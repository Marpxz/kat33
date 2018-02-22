<?php

use Illuminate\Database\Seeder;
use Kat33\Vehicle;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Vehicle::class, 80)->create();
    }
}
