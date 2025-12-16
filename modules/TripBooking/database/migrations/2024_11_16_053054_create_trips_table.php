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
        Schema::dropIfExists('trips');
        Schema::create('trips', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('ma_sinh_vien');
            $table->string('hoan_canh_gia_dinh')->nullable();
            $table->string('giay_xac_nhan')->nullable();
            $table->string('hoan_canh_ban_than')->nullable();
            $table->string('thong_tin_nguoi_lien_he');
            $table->string('so_dien_thoai_nguoi_than');
            $table->string('hanh_ly_mang_theo')->nullable();
            $table->string('van_de_suc_khoe')->nullable();
            $table->string('tinh_thanh');
            $table->string('dia_diem_xuong_xe');
            $table->integer('status')->default(0);
            $table->boolean('dong_y_cam_ket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
