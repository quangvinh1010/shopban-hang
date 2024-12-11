<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->integer('discount_amount')->nullable();
            $table->integer('discount_percent')->nullable();
            $table->timestamp('valid_from')->nullable();
            $table->timestamp('valid_to')->nullable();
            $table->integer('usage_limit')->nullable(); // Giới hạn số lần sử dụng
            $table->integer('used_count')->default(0);  // Số lần đã sử dụng
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}
