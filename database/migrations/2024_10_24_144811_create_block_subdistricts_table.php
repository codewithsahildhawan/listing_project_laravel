<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->integer('subdistrict_code')->length(11);
            $table->integer('district_code')->length(11);
            $table->integer('district_id')->length(11);
            $table->tinyInteger('status')->length(2)->default(1);
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subdistricts');
    }
};
