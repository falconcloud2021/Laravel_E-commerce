<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('cat_name_en')->unique();
            $table->string('cat_name_ua')->unique();
            $table->mediumText('cat_description_en')->nullable();
            $table->mediumText('cat_description_ua')->nullable();
            $table->string('cat_slug_en');
            $table->string('cat_slug_ua');
            $table->string('cat_image');
            $table->smallInteger('cat_rating')->default(0);
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
        Schema::dropIfExists('category');
    }
}
