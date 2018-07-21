<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('categories')->insert(
            array(['name' => 'Computers & Phones',
                'description'=> 'Computers, phones and their accessories such as chargers, etc'
            ],
                ['name' => 'Baby, Kids & Toys',
                    'description'=> 'Toys, baby products, gaming devices and many others'
                ],
                ['name' => 'Home & Living',
                    'description'=> 'Home appliances such TVs, DVDS, refrigerators, audio, etc'
                ],
                ['name' => 'Office Equipment',
                    'description'=> 'Consumables and equipment regularly used in offices by businesses'
                ],
                ['name' => 'Beauty & Fashion',
                    'description'=> 'Men and women\'s clothing, jewelry, perfumes, shoes, watches, etc'
                ],
                ['name' => 'Sports, Health, Fitness',
                    'description'=> 'Includes gym, sports and leisure equipments and health products'
                ],
                ['name' => 'Vehicles & Spare',
                    'description'=> 'Interiors & Accessories, tyre, tube & flaps , cars and tracks, etc'
                ],
                ['name' => 'Furniture & Crafts',
                    'description'=> 'Chairs, stools, office furniture, living and dining, and crafts.'
                ]
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
