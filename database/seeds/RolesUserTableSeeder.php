<?php

use App\Admin\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class RolesUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $roles = Role::all();
        $users = User::all();

        foreach ($users as $user) {

            //$randomRole = $faker->randomElement($roles);
            // $randomRoleId = Role::inRandomOrder()->first()->id;

            // $randomRoleId = [
            //     $faker->randomElement($roles)->id,
            //     $faker->randomElement($roles)->id,
            //     $faker->randomElement($roles)->id,
            // ];

            $randomRoles = $faker->randomElements( $roles, 2, false );

            foreach ($randomRoles as $randomRole) {

                $user->roles()->sync($randomRole->id);
            }
        }



    }
}
