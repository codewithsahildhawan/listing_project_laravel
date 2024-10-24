<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('states', function (Blueprint $table) {
            $table->integer('state_id')->length(11)->autoIncrement()->primary();
            $table->string('state_name'); // State name
            $table->string('state_code')->nullable(); // State code, e.g., 'CA'
            $table->string('country_id')->default('IN'); // Country name, default to USA
            $table->string('status')->default('1'); 
            $table->string('deleted')->default('0'); 
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable(); // Only update on explicit updates
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
