<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('match_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id')->nullable();
            $table->unsignedBigInteger('team_id')->nullable();
            $table->unsignedBigInteger('player_id')->nullable();
            $table->unsignedBigInteger('assistant_player_id')->nullable();
            $table->unsignedBigInteger('player_in_id')->nullable();
            $table->unsignedBigInteger('player_out_id')->nullable();
            $table->string('event_type');
            $table->integer('event_minute');

            $table->foreign('match_id')->constrained()->references('id')->on('matches')->cascadeOnDelete();
            $table->foreign('team_id')->constrained()->references('id')->on('teams')->cascadeOnDelete();
            $table->foreign('player_id')->constrained()->references('id')->on('players')->cascadeOnDelete();
            $table->foreign('assistant_player_id')->constrained()->references('id')->on('players')->cascadeOnDelete();
            $table->foreign('player_in_id')->constrained()->references('id')->on('players')->cascadeOnDelete();
            $table->foreign('player_out_id')->constrained()->references('id')->on('players')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_events');
    }
};
