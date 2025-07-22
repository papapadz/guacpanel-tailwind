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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained(
                table: 'owners', indexName: 'memberships_owner_id'
            );
            $table->foreignId('membership_type_id')->constrained(
                table: 'membership_types', indexName: 'memberships_membership_type_id'
            );
            $table->date('registration_date');
            $table->date('expiry_date')->nullable();
            $table->foreignId('entry_by')->constrained(
                table: 'users', indexName: 'memberships_entry_by'
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
        Schema::dropIfExists('memberships');
    }
};
