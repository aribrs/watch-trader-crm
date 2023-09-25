<?php

use App\Models\Customers;
use App\Models\Employee;
use App\Models\Products;
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
            $table->foreignIdFor(Customers::class);
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('secondary_product_id')->nullable();
            $table->foreignIdFor(Employee::class)->nullable();
            $table->char('status', 1);
            $table->char('priority', 1);
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
