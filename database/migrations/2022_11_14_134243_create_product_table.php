<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('prod_name_en')->unique();
            $table->text('prod_description_en');
            $table->string('prod_name_ua')->unique();
            $table->text('prod_description_ua');
            $table->string('prod_slug_en');
            $table->string('prod_slug_ua');
            $table->decimal('price', 5, 2);
            $table->string('prod_image'); 
            $table->smallInteger('prod_rating')->default(0);
            $table->smallInteger('category_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
