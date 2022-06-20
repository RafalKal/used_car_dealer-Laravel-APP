<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarManufacturer;
use App\Models\CarModel;
use App\Models\CarStatus;
use App\Models\FuelType;
use App\Models\TransmissionType;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //Super admin
        User::factory()->create([
            'email' => 'admin@admin.com',
            'name' => 'admin',
            'surname' => 'admin',
            'password' => 'admin',
            'email_verified_at' => now()
        ]);

        //Pozwolenia
        Permission::create(['name' => 'user']);
        Permission::create(['name' => 'admin']);
        Permission::create(['name' => 'super-admin']);

        //role
        $superAdminRole = Role::create(['name' => 'super-admin']);

        $superAdmin = User::find(1);
        //Przypisywanie roli do super admina
        $superAdmin->assignRole('super-admin');


        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('admin');
        $adminRole->givePermissionTo('user');

        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo('user');

        $superAdminRole->givePermissionTo(Permission::all());

        //Rodzaje przekładni

        TransmissionType::factory()->create([
            'full_name' => 'Automatic Transmission',
            'short_name' => 'AT'
        ]);

        TransmissionType::factory()->create([
            'full_name' => 'Manual Transmission',
            'short_name' => 'MT'
        ]);

        TransmissionType::factory()->create([
            'full_name' => 'Automated Manual Transmission',
            'short_name' => 'AM'
        ]);

        TransmissionType::factory()->create([
            'full_name' => 'Continuously Variable Transmission',
            'short_name' => 'CVT'
        ]);

        //Rodczaje paliw

        FuelType::factory()->create([
            'name' => 'Petrol'
        ]);

        FuelType::factory()->create([
            'name' => 'Diesel'
        ]);

        FuelType::factory()->create([
            'name' => 'LPG'
        ]);

        //Producenci

        CarManufacturer::factory()->create([
           'name' => 'Toyota'
        ]);

        CarManufacturer::factory()->create([
            'name' => 'Volkswagen'
        ]);

        CarManufacturer::factory()->create([
            'name' => 'Audi'
        ]);

        CarManufacturer::factory()->create([
            'name' => 'Mercedes'
        ]);

        CarManufacturer::factory()->create([
            'name' => 'BMW'
        ]);

        CarManufacturer::factory()->create([
            'name' => 'Citroen'
        ]);

        //Modele

        CarModel::factory()->create([
           'name' => 'Passat CC',
           'car_manufacturer_id' => 2
        ]);

        CarModel::factory()->create([
            'name' => 'A5',
            'car_manufacturer_id' => 3
        ]);

        CarModel::factory()->create([
            'name' => 'W203',
            'car_manufacturer_id' => 4
        ]);

        //statusy

        CarStatus::factory()->create([
           'name' => 'available'
        ]);

        CarStatus::factory()->create([
            'name' => 'not available'
        ]);

        CarStatus::factory()->create([
            'name' => 'sold'
        ]);

        //samochody

        Car::factory()->create([
            'year' => Date::createFromFormat('Y', '2010'),
            'owners_count' => 3,
            'course' => 203500,
            'engine' => '1.8 TSI',
            'price' => '30000',
            'car_status_id' => 1,
            'car_model_id' => 1,
            'transmission_type_id' => 1,
            'fuel_type_id' => 1
        ]);
    }
}
