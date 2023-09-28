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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('product_id')->nullable()->constrained('products');
            $table->double('price', null, null, true)->default(0);
            $table->foreignId('secondary_product_id')->nullable()->constrained('products');
            $table->double('secondary_price', null, null, true)->default(0);
            $table->foreignId('employee_id')->nullable()->constrained();
            $table->foreignId('lead_status_id')->default(1)->constrained();
            $table->char('priority', 1)->default('N');
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
        Schema::dropIfExists('leads');
    }
};
