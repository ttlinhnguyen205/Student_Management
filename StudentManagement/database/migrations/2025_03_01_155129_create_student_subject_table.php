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
        Schema::create('student_subject', function (Blueprint $table) {
            $table->id(); // Khóa chính tự động tăng
            $table->string('MSSV', 8); // Khóa ngoại sinh viên
            $table->string('IdSubject', 8); // Khóa ngoại môn học
            $table->timestamps();
        
            // Thiết lập khóa ngoại với bảng students và subjects
            $table->foreign('MSSV')->references('MSSV')->on('students')->onDelete('cascade');
            $table->foreign('IdSubject')->references('IdSubject')->on('subjects')->onDelete('cascade');
        
            // Đảm bảo mỗi sinh viên không đăng ký trùng môn học
            $table->unique(['MSSV', 'IdSubject']);
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('student_subject');
    }
};
