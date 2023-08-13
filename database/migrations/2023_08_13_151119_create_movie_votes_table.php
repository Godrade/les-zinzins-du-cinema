<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('movie_votes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('movie_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('rating', 8, 1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movie_votes');
    }
};
