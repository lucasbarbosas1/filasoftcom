<?php

use Illuminate\Database\Seeder;

class configSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::Table('configuracao')->insert(
            array(
                'filaAtiva'=>0,
                'created_at'=>DB::raw('CURRENT_TIMESTAMP')
            ));
    }
}
