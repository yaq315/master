<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  // في ملف database/migrations/xxxx_create_categories_table.php
  public function up()
  {
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('slug')->unique();
        $table->text('description')->nullable();
        $table->string('image')->nullable();
        $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('cascade');
        $table->boolean('is_active')->default(true);
        $table->timestamps();
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
