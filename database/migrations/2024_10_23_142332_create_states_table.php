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
            $table->integer('state_id')->autoIncrement()->primary();
            $table->string('state_name'); // State name
            $table->integer('state_code')->length(11);
            $table->string('country_id')->default('IN'); // Country name, default to USA
            $table->tinyInteger('status')->length(2)->default(1);
            $table->tinyInteger('deleted')->length(2)->default(0);
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
