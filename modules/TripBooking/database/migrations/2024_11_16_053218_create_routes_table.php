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
        Schema::dropIfExists('routes');
        Schema::create('routes', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('ma_tuyen_duong');
            $table->string('ten_tuyen_duong');
            $table->string('khu_vuc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
