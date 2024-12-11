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
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->integer('status')->default('chưa xác nhận');
            $table->string('phone', 15)->change();
            $table->string('address')->nullable();
            // tao khoa ngoai
            $table->unsignedBigInteger('customer_id'); 
            $table->foreign('customer_id')->references('id')->on('customer');
            // end tao khoa ngoai
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
        Schema::dropIfExists('orders');
    }
};
