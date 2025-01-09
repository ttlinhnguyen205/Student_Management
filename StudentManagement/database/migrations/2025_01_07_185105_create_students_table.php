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
        Schema::create('students', function (Blueprint $table) {
            $table->string('MSSV', 8)->primary();       // Khóa chính, giới hạn độ dài là 8 ký tự
            $table->string('LastName');                  // Họ
            $table->string('FirstName');                 // Tên
            $table->date('BirthDay');                    // Ngày sinh
            $table->enum('Gender', ['Male', 'Female']);  // Giới tính
            $table->string('Avatar')->nullable();        // Đường dẫn ảnh đại diện
            $table->string('IdSubject', 8);              // Khóa ngoại liên kết với bảng subjects, giới hạn độ dài là 8 ký tự
        
            // Thiết lập khóa ngoại với bảng subjects
            $table->foreign('IdSubject')->references('IdSubject')->on('subjects')->onDelete('cascade');
        
            $table->timestamps();                        // Thời gian tạo và cập nhật
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
