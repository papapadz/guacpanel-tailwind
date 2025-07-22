<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pet_vaccination_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained(
                table: 'pets', indexName: 'pet_vaccination_infos_pet_id'
            );
            $table->foreignId('pet_item_library_id')->constrained(
                table: 'pet_item_libraries', indexName: 'pet_vaccination_infos_pet_item_library_id'
            );
            $table->datetime('administered_date');
            $table->foreignId('administered_by')->constrained(
                table: 'people', indexName: 'pet_vaccination_infos_administered_by'
            );
            $table->foreignId('administered_at')->constrained(
                table: 'company_profiles', indexName: 'pet_vaccination_infos_administered_at'
            );
            $table->foreignId('entry_by')->constrained(
                table: 'users', indexName: 'pet_vaccination_infos_entry_by'
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
        Schema::dropIfExists('pet_vaccination_infos');
    }
};
