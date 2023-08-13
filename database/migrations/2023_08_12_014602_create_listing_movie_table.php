<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('listing_movie', function (Blueprint $table) {
            $table->id();

            $table->foreignId('movie_id')->constrained();
            $table->foreignId('listing_id')->constrained();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('listing_movie');
    }
};
