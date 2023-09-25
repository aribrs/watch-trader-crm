<?php

use App\Models\Leads;
use App\Models\Schedules;
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
            $table->foreignIdFor(Leads::class);
            $table->foreignIdFor(Schedules::class);
            $table->bigInteger('meet_expense_amount')->default(0);
            $table->bigInteger('ride_expense_amount')->default(0);
            $table->bigInteger('total_expense_amount')->default(0);
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
