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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("author_id");
            $table->unsignedBigInteger("publisher_id");
            $table->unsignedBigInteger("series_id")->nullable();
            $table->string("name");
            $table->string("photo")->nullable();
            $table->integer("release_year");
            $table->text("description");
            $table->foreign("category_id")->references("id")->on("category")->onDelete("restrict");
            $table->foreign("author_id")->references("id")->on("author")->onDelete("restrict");
            $table->foreign("publisher_id")->references("id")->on("publisher")->onDelete("restrict");
            $table->foreign("series_id")->references("id")->on("series")->onDelete("set null");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
