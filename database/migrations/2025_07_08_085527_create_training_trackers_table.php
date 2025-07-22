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
        Schema::create('training_trackers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_enrollment_id')->constrained(
                table: 'service_enrollments', indexName: 'training_trackers_enrollment_id'
            );
            $table->text('notes');
            $table->foreignId('entry_by')->constrained(
                table: 'users', indexName: 'training_trackers_entry_by'
            );
            $table->timestamp('training_date')->useCurrent();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_trackers');
    }
};
