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
        Schema::dropIfExists('activities');
        Schema::create('activities', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('heading');
            $table->string('slug');
            $table->string('short_description');
            $table->string('description');
            $table->string('total_view');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
