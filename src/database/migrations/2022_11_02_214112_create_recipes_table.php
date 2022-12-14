<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnUpdate()->restrictOnDelete();

            $table->string('name', 128);
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();

            $table->string('prep_time', 16);
            $table->string('cook_time', 16);
            $table->string('total_time', 16);
            $table->foreignId('recipe_time_unit_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();

            $table->unsignedTinyInteger('servings');

            $table->foreignId('difficulty_level_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();

            $table->string('ext_url')->nullable();
            $table->string('video_path')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};
