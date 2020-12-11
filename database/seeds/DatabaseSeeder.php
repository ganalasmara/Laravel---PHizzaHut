<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
           [    'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=> Hash::make('adminn'),
                'address'=>'rumah admin',
                'phone'=>'081223125412',
                'gender'=>'male',
                'role'=>'2'
           ]
           ]);

        DB::table('pizzas')->insert([
            [
                'name'=>'Cheese Bomb',
                'description'=>'Pizza with Cheese and Edible Bomb',
                'photo'=>'../img/1.jpg',
                'price'=> '20000'
            ],
            [
                'name'=>'Mega Melt',
                'description'=>'Pizza with Extra-Melt Cheese',
                'photo'=>'../img/2.jpg',
                'price'=> '30000'
            ],
            [
                'name'=>'Last Meal',
                'description'=>'The last pizza you will ever need, with heavenly toppings',
                'photo'=>'../img/3.jpg',
                'price'=> '100000'
            ],
            [
                'name'=>'Black Cheeza',
                'description'=>'Black Flour Pizza with Cheese and Onion',
                'photo'=>'../img/4.jpg',
                'price'=> '60000'
            ],
            [
                'name'=>'Hawaiian Classic',
                'description'=>'The Hawaiian Classic that will be your favourite',
                'photo'=>'../img/5.jpg',
                'price'=> '20000'
            ],
            [
                'name'=>'American Classic',
                'description'=>'American sized pizza with chicken meat and cheese',
                'photo'=>'../img/6.jpg',
                'price'=> '50000'
            ],
            [
                'name'=>'Meat Lover',
                'description'=>'The Meat Gang of Pizza is Here! Lots and Lots of Meat!',
                'photo'=>'../img/7.jpg',
                'price'=> '20000'
            ],
            [
                'name'=>'Indomie Pizza',
                'description'=>'Pizza with a unique topping of Indomie',
                'photo'=>'../img/8.jpg',
                'price'=> '200000'
            ],
            [
                'name'=>'Kebab Pizza',
                'description'=>'Yes, it exist and we have it here! the infamous Kebab Pizza',
                'photo'=>'../img/9.jpg',
                'price'=> '150000'
            ]
        ]);
    }
}
