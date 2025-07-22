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
        Schema::create('pet_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_item_library_id')->constrained(
                table: 'pet_item_libraries', indexName: 'pet_items_pet_item_library_id'
            );
            // $table->enum('condition',['NEW','USED','WORNOUT'])->default('NEW');
            $table->foreignId('service_enrollment_id')->constrained(
                table: 'service_enrollments', indexName: 'pet_items_service_enrollment_id'
            );
            $table->integer('quantity')->default(1);
            $table->string('note',150)->nullable();
            $table->text('image_file')->nullable();
            $table->foreignId('entry_by')->constrained(
                table: 'users', indexName: 'pet_items_entry_by'
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
        Schema::dropIfExists('pet_items');
    }
};
