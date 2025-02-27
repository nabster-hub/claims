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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('address');
            $table->string('phone');
            $table->decimal('power')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('last_edit_user')->unsigned()->nullable();
            $table->smallInteger('status')->unsigned();
            $table->bigInteger('connect_id')->unsigned()->nullable();
            $table->smallInteger('type')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
