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
        Schema::create('service_billings', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number',10);
            $table->enum('bill_type',['MEMBERSHIP','SERVICE','PRODUCT']);
            $table->json('reference_table');
            $table->foreignId('owner_id')->constrained(
                table: 'owners', indexName: 'service_billings_owner_id'
            );
            $table->enum('payment_term',['FULL','TERM']);
            $table->enum('status',['DRAFT','PENDING','APPROVED']);
            $table->text('note');
            $table->foreignId('entry_by')->constrained(
                table: 'users', indexName: 'service_billings_entry_by'
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
        Schema::dropIfExists('service_billings');
    }
};
