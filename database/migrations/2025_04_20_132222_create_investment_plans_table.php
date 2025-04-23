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
        Schema::create('investment_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_id')->unique(); // e.g., 'growth', 'income', 'balanced'
            $table->string('name');
            $table->string('image')->nullable();
            $table->text('description');
            $table->decimal('minimum_investment', 15, 2);
            $table->string('risk_level');
            $table->string('focus');
            $table->decimal('target_return_min', 8, 2)->nullable();
            $table->decimal('target_return_max', 8, 2)->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investment_plans');
    }
};