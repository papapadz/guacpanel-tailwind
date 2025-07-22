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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('breed_id')->constrained(
                table: 'breeds', indexName: 'pets_breed_id'
            );
            $table->string('name',100);
            $table->string('last_name',100)->nullable();
            $table->string('color',16);
            $table->date('birth_date');
            $table->enum('gender',['MALE','FEMALE']);
            $table->enum('temperement',['RED','ORANGE','GREEN']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
