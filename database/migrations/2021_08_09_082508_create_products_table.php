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
            $table->unsignedBigInteger('brand_id');
            $table->string('sku', 100);
            $table->string('name', 100);
            $table->text('description');
            // $table->string('image');
            $table->enum('iSPreOrder', ['1', '0'])->default('0');
            $table->integer('price');
            $table->enum('hasVoucher', ['1', '0'])->default('0');
            $table->float('rating')->default(0)->max(5);
            $table->integer('totalRating')->default(0);
            $table->string('variant', 50);
            $table->integer('stock')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
