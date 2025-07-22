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
        Schema::create('training_tracker_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_tracker_id')->constrained(
                table: 'training_trackers', indexName: 'training_tracker_logs_training_tracker_id'
            );
            $table->foreignId('training_tracker_item_id')->constrained(
                table: 'training_tracker_items', indexName: 'training_tracker_logs_training_tracker_item_id'
            );
            $table->integer('score');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_tracker_logs');
    }
};
