<?php
use Illuminate\Database\Seeder;
/**
* 
*/
class CategoryTableSeeder extends Seeder
{
	
	public function run($value='')    {
        \DB::table('categories')->insert(
            array(
                'category_name' => 'Marcas',
            )
        );

        \DB::table('categories')->insert(
            array(
                'category_name' => 'Genericos',
            )
        );

    }
}
