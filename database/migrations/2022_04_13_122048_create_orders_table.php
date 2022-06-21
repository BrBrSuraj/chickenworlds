<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->bigInteger('transactionCode')->unique();
            $table->unsignedBigInteger('selectedCategory')->constrained();
            $table->foreign('selectedCategory')->references('id')->on('categories');
            $table->unsignedBigInteger('selectedProduct')->constrained();
            $table->foreign('selectedProduct')->references('id')->on('products');
            $table->unsignedFloat('weight')->nullable();
            $table->unsignedBigInteger('rate');
            $table->bigInteger('qty')->nullable();
            $table->string('vaichele');
            $table->json('staff');//store vaichele staff as array to load the product
            $table->boolean('status')->default(false);
            $table->date('received_date')->nullable();
            $table->timestamps();
            // $table->timestamp('created_at')->useCurrent();
            // $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
