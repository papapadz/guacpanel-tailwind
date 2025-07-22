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
        Schema::create('pet_item_libraries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_item_type_id')->constrained(
                table: 'pet_item_types', indexName: 'pet_items_pet_item_type_id'
            );
            $table->string('name',100);
            $table->string('brand',100)->nullable();
            $table->enum('packaging',['NONE','BOX','SACK','BAG','CAN','BOTTLE','SACHET'])->default('NONE');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pet_item_libraries');
    }
};
