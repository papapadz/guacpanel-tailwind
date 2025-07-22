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
        Schema::create('service_enrollment_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_enrollment_id')->constrained(
                table: 'service_enrollments', indexName: 'pservice_enrollment_logs_enrollment_id'
            );
            $table->foreignId('entry_by')->constrained(
                table: 'users', indexName: 'service_enrollment_logs_entry_by'
            );
            $table->enum('log_type',['INFO','BILLING','PAYMENT','SERVICE']);
            $table->json('table_reference')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_enrollment_logs');
    }
};
