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
        Schema::table('connects', function (Blueprint $table) {
            $table->date('act_date')->nullable();
            $table->bigInteger('act_number')->nullable();
            $table->bigInteger('receipt_number')->nullable();
            $table->bigInteger('receipt_sum')->nullable();
            $table->string('SMR')->nullable();
            $table->integer('distance_solder')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('connects', function (Blueprint $table) {
            $table->dropColumn(['act_date', 'act_number', 'receipt_number', 'receipt_sum', 'distance_solder', 'SMR']);
        });
    }
};
