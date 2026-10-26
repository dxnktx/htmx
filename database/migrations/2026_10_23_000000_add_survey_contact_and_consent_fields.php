<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('surveys', function (Blueprint $table) {
            $table->string('email')->default('');
            $table->string('departure_time_other')->nullable();
            $table->text('student_note')->nullable();
            $table->boolean('is_agreed')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('surveys', function (Blueprint $table) {
            $table->dropColumn([
                'email',
                'departure_time_other',
                'student_note',
                'is_agreed',
            ]);
        });
    }
};
