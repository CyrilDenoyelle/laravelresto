<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('products')->insert([
        		"name"=>"nem de riz",
        		"price"=>"12.5",
        		"description"=>"trop trop bon les nem de riz AOC"
        	]);
        DB::table('products')->insert([
        		"name"=>"sammossas de poulet fermier",
        		"price"=>".45",
        		"description"=>"poulet elleves en nature bien sur !"
        	]);
        DB::table('products')->insert([
        		"name"=>"porc au caramel",
        		"price"=>"4.5",
        		"description"=>"de supperbe bout de porc trop on dans du superbe caramel trop bon aussi "
        	]);
    }
}
