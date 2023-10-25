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
        Schema::create('surveys', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('category_id')->constrained('category_surveys')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('link_survey')->nullable();
            $table->json('polygon')->nullable();
            $table->longText('description')->nullable();
            $table->string('poin')->nullable();
            $table->text('location')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('visit_max')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
