<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{    
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('users'))
        {
            Schema::table('users', function($table)
            {
                $table->string('ma_sinh_vien')->nullable();
                $table->string('ho_va_ten')->nullable();
                $table->boolean('gioi_tinh')->nullable();            
                $table->date('ngay_sinh')->nullable();
                $table->string('so_cccd')->nullable();
                $table->string('so_dien_thoai')->nullable();
                $table->string('dia_chi')->nullable();
                $table->string('noi_o_hien_tai')->nullable();
                $table->string('cccd_mat_truoc')->nullable();
                $table->string('cccd_mat_sau')->nullable();
                $table->string('so_tai_khoan')->nullable();
                $table->string('ten_tai_khoan')->nullable();
                $table->string('ngan_hang')->nullable();
                $table->string('chi_nhanh')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
