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
            $table->foreignId('category_id')->constrained('categories')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();

            $table->string('name');
            $table->text('short_description', 1024)->nullable();
            $table->text('description')->nullable();

            $table->unsignedDecimal('prep_time', 5, 2);
            $table->unsignedBigInteger('prep_time_unit_id');
            $table->unsignedDecimal('cook_time', 5, 2);
            $table->unsignedBigInteger('cook_time_unit_id');

            $table->tinyInteger('servings', 2);

            $table->foreignId('difficulty_level_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();

            $table->string('ext_url')->nullable();
            $table->string('image_path')->nullable();
            $table->string('video_path')->nullable();

            $table->timestamps();
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
