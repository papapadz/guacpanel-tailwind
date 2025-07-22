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
        Schema::create('pet_medical_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained(
                table: 'pets', indexName: 'pet_medical_infos_pet_id'
            );
            $table->text('chief_complaint');
            $table->text('diagnosis');
            $table->enum('visit_type',['CONSULT','ADMISSION','SURGERY'])->default('CONSULT');
            $table->foreignId('seen_at')->constrained(
                table: 'company_profiles', indexName: 'pet_medical_infos_seen_at'
            );
            $table->foreignId('entry_by')->constrained(
                table: 'users', indexName: 'pet_medical_infos_entry_by'
            );
            $table->timestamp('visit_date')->useCurrent();
            $table->datetime('release_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pet_medical_infos');
    }
};
