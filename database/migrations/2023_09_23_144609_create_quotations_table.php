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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained();
            $table->timestamp('expired_at');
            $table->foreignId('product_id')->constrained();
            $table->double('price', null, null, true)->default(0);
            $table->double('discount', null, null, true)->default(0);
            $table->double('total_price', null, null, true)->default(0);
            $table->char('status', 1)->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('quotations');
    }
};
