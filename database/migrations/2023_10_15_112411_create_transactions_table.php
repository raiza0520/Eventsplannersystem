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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('package_id');
            $table->decimal('package_amount', 10, 2);
            $table->decimal('addons_total_amount', 10, 2)->default(0);
            $table->decimal('customize_total_amount', 10, 2)->default(0);
            $table->decimal('total_amount', 10, 2)->virtualAs('package_amount + addons_total_amount + customize_total_amount');
            $table->json('addons')->nullable();
            $table->json('customize')->nullable();
            $table->string('remarks')->nullable();
            $table->text('reason')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
