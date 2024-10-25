<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    protected $table = 'subdistricts'; // Define the table name if it's not the plural of the model name
    protected $primaryKey = 'subdistrict_id'; // Custom primary key
    public $incrementing = true;
    protected $fillable = [
        'subdistrict_name',
        'district_id',
    ];

    public $timestamps = true; // Enable timestamps
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('subdistricts', function (Blueprint $table) {
            $table->integer('subdistrict_id')->length(11)->autoIncrement()->primary();
            $table->string('subdistrict_name')->unique();
            $table->foreignId('district_id')->constrained()->onDelete('cascade'); // Foreign key referencing districts table
            $table->string('status')->default('1'); 
            $table->string('deleted')->default('0'); 
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable(); // Only update on explicit updates
        });
    }

    public function down()
    {
        Schema::dropIfExists('subdistricts');
    }
};
