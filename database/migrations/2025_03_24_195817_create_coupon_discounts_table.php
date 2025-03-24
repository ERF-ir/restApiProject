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
        Schema::create('coupon_discounts', function (Blueprint $table) {
           $table->id();
           $table->string('title');
           $table->tinyInteger('percentage');
           $table->string('coupon_code');
           $table->timestamp('start_at')->nullable();
           $table->timestamp('end_at')->nullable();
           $table->enum('status', ['0', '1'])->default('0');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_discounts');
    }
};
