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
        Schema::create('pet_feeding_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained(
                table: 'pets', indexName: 'pet_feeding_infos_pet_id'
            );
            $table->foreignId('entry_by')->constrained(
                table: 'users', indexName: 'spet_feeding_infos_entry_by'
            );
            $table->foreignId('pet_item_library_id')->constrained(
                table: 'pet_item_libraries', indexName: 'pet_feeding_infos_item_library_id'
            );
            $table->decimal('quantity',5,2);
            $table->enum('unit',['CUP','CAN','BOWL','BAG','SACHET','PIECE']);
            $table->enum('food_intake',['COMPLETE','W_LEFTOVERS','DID_NOT_EAT']);
            $table->timestamp('served_at')->useCurrent();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pet_feeding_infos');
    }
};
