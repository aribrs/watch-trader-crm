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
        Schema::create('schedule_realizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained();
            $table->foreignId('schedule_id')->constrained();
            $table->double('meet_expense', null, null, true)->default(0);
            $table->double('ride_expense', null, null, true)->default(0);
            $table->double('total_expense', null, null, true)->default(0);
            $table->string('customer_feedback')->nullable();
            $table->boolean('is_receipt_uploaded')->detault(false);
            $table->string('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_realizations');
    }
};
