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
        Schema::create('billing_products', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('b_id');
            $table->string('p_id');
            $table->string('qty');
            $table->string('rate');
            $table->string('amt');
            // $table->string('bil_amt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing_products');
    }
};
