<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('UserId');
            $table->timestamp('OrderDate');
            $table->string('ShippingAddress');
            $table->decimal('TotalAmount', 8, 2);
            $table->string('PaymentMethod');
            $table->string('ShippingMethod');
            $table->string('OrderStatus')->default('pending');
            $table->string('DeliveryStatus')->default('pending');

            $table->timestamps();

            $table->foreign('UserId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
