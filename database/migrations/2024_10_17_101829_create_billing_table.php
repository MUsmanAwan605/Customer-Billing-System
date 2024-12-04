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
        Schema::create('billing', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('mob_no');
            $table->string('adr');
            $table->string('email');
            $table->string('c_id');
            $table->string('bil_amt');
            $table->string('p_amt');
            $table->string('tot_amt');
            $table->string('r_amt');
            $table->string('bal_amt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing');
    }
};
