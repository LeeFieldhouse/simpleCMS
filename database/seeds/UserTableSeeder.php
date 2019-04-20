<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('testing')
        ]);
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('companies')->insert([
                'name' => $faker->company,
                'address' => $faker->address,
                'email' => $faker->email,
                'website' => $faker->domainName
            ]);

            DB::table('employees')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'company_id' => rand(1, App\Company::count())
            ]);
        }

    }
}
