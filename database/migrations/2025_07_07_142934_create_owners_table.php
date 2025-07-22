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
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->constrained(
                table: 'people', indexName: 'owners_person_id'
            );
            $table->foreignId('pet_id')->constrained(
                table: 'pets', indexName: 'owners_pet_id'
            );
            $table->string('certificate_no',100)->nullable();
            $table->enum('acquisition',['OWNED','ADOPTION','RESCUE','BOUGHT'])->default('OWNED');
            $table->text('acquired_from')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
