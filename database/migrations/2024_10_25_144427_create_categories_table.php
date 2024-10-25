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
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->integer('category_id')->length(11)->autoIncrement()->primary();
            $table->string('category_title');
            $table->string('cat_short_desc')->nullable();
            $table->text('cat_long_desc')->nullable();
            $table->string('cat_image')->nullable(); // Store the file name or path
            $table->unsignedBigInteger('parent_id')->nullable(); // For hierarchical structure
            $table->integer('order_by')->default(0);
            $table->string('meta_title')->nullable();
            $table->string('meta_short_desc')->nullable();
            $table->text('meta_desc')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->tinyInteger('status')->length(2)->default(1);
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
