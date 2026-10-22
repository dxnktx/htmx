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
            $table->id();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->string('full_name');
            $table->string('training_unit');
            $table->string('training_unit_other')->nullable();
            $table->string('student_year');
            $table->string('current_residence');
            $table->string('family_situation');
            $table->string('family_situation_other')->nullable();
            $table->string('destination_province');
            $table->string('departure_time');
            $table->string('support_type');
            $table->string('ip_address', 45)->nullable();
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
