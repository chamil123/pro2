<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'user_nic' =>  '123456789V',
            'name' => "Admin",
            'user_contact_1' => '123456789V',
            'user_address' => '',
            'user_gender' => '',
            'user_dob' => '',
            'user_contact_2' => '',
            'user_bank_name' => '',
            'user_bank_branch' => '',
            'user_account_no' => '',
            'user_benifit_name' => '',
            'user_benifit_address' => '',
            'user_status' => '1',
            'user_pv' => '',
//                    'lastname' => $data['lastname'],
            'email' => "",
            'image' => "default_image.png",
            'password' => bcrypt(123456),

        ]);
         DB::table('categories')->insert([
            'cat_name' =>  'ELECTRIC ITEMS',
            'cat_description' => "Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            'cat_status' => '1',


        ]);
    }

}
