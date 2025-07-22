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
        Schema::create('service_billing_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_billing_id')->constrained(
                table: 'service_billings', indexName: 'service_billing_items_service_billing_id'
            );
            $table->string('name',100);
            $table->integer('quantity')->default(1);
            $table->decimal('amount',9,2);
            $table->decimal('discount',9,2)->default(0);
            $table->string('note',255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_billing_items');
    }
};
