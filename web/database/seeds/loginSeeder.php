<?php

use Illuminate\Database\Seeder;

class loginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::Table('login')->insert(
            array(
                'login'=> "admin",
                "password"=> Hash::make("admin"),
                "senha_desk" => md5("admin"),
                "tipo"=>"1",
                "remember_token"=> str_random("10"),
                'created_at' => DB::raw('CURRENT_TIMESTAMP')
            ));
    }    
}
