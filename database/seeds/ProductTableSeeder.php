<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Fake;
/**
* 
*/
class ProductTableSeeder extends Seeder
{
	
	public function run($value='')
	{
        $fake = Fake::create();

        for($i = 0;$i<30; $i++) {

            $logoId = \DB::table('logos')->insertGetId(
                $arrayName = array(
                    'logo_uri' => $fake->unique()->imageUrl($width = 640, $height = 480),
                )
            );



            $productId = \DB::table('products')->insertGetId(
                $arrayName = array(
                    'product_name' => $fake->company,
                    'indication' => $fake->paragraph(rand(2,5)),
                    'logo_id' => $logoId,
                    'product_id' => $fake->unique()->numberBetween($min = 1000, $max = 9000),
                    'category_id' => $fake->numberBetween(1,2)

                )
            );
            for($j = 0;$j<3; $j++) {
                \DB::table('images')->insert(
                    array(
                        'image_uri' =>$fake->unique()->imageUrl($width = 640, $height = 480),
                        'product_id' => $productId
                    )
                );
            }
        }



	}
}