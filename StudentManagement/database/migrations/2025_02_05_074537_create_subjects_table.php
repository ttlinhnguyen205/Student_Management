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
        Schema::create('subjects', function (Blueprint $table) {
            $table->string('IdSubject', 8)->primary();  // Khóa chính, giới hạn độ dài là 8 ký tự
            $table->string('NameSubject');               // Tên môn học
            $table->text('Note')->nullable();            // Ghi chú có thể để trống
            $table->boolean('Deleted')->default(false);  // Trạng thái xóa, mặc định là false
            $table->date('start_date');                  // Ngày bắt đầu môn học
            $table->date('end_date');                    // Ngày kết thúc môn học
            $table->timestamps();                        // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};