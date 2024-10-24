<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->integer('city_id')->autoIncrement()->primary();
            $table->string('city_name');  // Name of the city
            $table->string('city_code')->nullable();  // Optional city code
            $table->unsignedBigInteger('state_id');  // Foreign key referencing the states table
            $table->string('status')->default('1'); 
            $table->string('deleted')->default('0'); 
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable(); // Only update on explicit updates

            // Foreign key constraint for state_id
            $table->foreign('state_id')->references('city_id')->on('states')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
};
