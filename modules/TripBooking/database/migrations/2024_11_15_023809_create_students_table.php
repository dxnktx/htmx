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
        Schema::dropIfExists('students');
        Schema::create('students', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('ma_sinh_vien');
            $table->string('ten_sinh_vien');
            $table->string('don_vi_dao_tao');
            $table->string('khoa_bo_mon');
            $table->integer('sinh_vien_nam_thu');
            $table->float('diem_trung_binh');
            $table->string('thanh_tich_hoat_dong_xa_hoi')->nullable();
            $table->string('danh_hieu_5_tot')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
