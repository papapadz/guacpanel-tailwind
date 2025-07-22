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
        Schema::create('service_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_billing_id')->constrained(
                table: 'service_billings', indexName: 'service_payments_service_billing_id'
            );
            $table->enum('payment_mode',['CASH','CREDIT','EWALLET','BANK_TRANSFER','CHECK']);
            $table->string('reference_number',20);
            $table->string('account_number',20)->nullable();
            $table->timestamp('payment_date')->useCurrent();
            $table->decimal('amount',9,2);
            $table->foreignId('entry_by')->constrained(
                table: 'users', indexName: 'service_payments_entry_by'
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
        Schema::dropIfExists('service_payments');
    }
};
