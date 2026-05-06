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
            $table->integer('product_id');
            $table->float('product_price');
            $table->integer('product_qty');
            $table->integer('status');            
            $table->integer('tran_id')->nullable();            
            $table->string('error')->nullable();            
            $table->string('tran_date')->nullable();            
            $table->float('amount')->nullable();            
            $table->string('bank_tran_id')->nullable();            
            $table->string('card_issuer')->nullable();            
            $table->string('card_brand')->nullable();            
            $table->string('val_id')->nullable();            
            $table->string('card_type')->nullable();            
            $table->timestamps();
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
