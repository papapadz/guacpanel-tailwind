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
        Schema::create('pet_vitals_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained(
                table: 'pets', indexName: 'pet_vitals_infos_pet_id'
            );
            $table->decimal('height',5,2);
            // $table->decimal('weigth',5,2);
            $table->decimal('temperature',5,2)->nullable();
            $table->string('poop_description',100)->nullable();
            $table->foreignId('entry_by')->constrained(
                table: 'users', indexName: 'pet_vitals_infos_entry_by'
            );
            $table->timestamp('vitals_at')->useCurrent();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pet_vitals_infos');
    }
};
