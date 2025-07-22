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
        Schema::create('service_enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained(
                table: 'owners', indexName: 'service_enrollments_owner_id'
            );
            $table->foreignId('pet_service_id')->constrained(
                table: 'pet_services', indexName: 'service_enrollments_pet_service_id'
            );
            $table->datetime('enrollment_date');
            $table->datetime('expiry_date')->nullable();
            $table->foreignId('entry_by')->constrained(
                table: 'users', indexName: 'service_enrollments_entry_by'
            );
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_enrollments');
    }
};
