<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->integer('category_id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->longText('description')->nulable();
            $table->bigInteger('qty')->nullable();
            $table->bigInteger('available')->nullable();
            $table->bigInteger('sold')->nullable();
            $table->bigInteger('price')->nullable();
            $table->integer('discount')->nullable();
            $table->boolean('is_new')->default(false);
            $table->boolean('is_offer')->default(false);
            $table->text('size')->nullable();
             $table->text('color')->nullable();
            $table->string('title_tag')->unique();
            $table->longText('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            $table->softDeletes();
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
