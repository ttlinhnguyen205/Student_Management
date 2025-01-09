<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Đặt tên bảng 
    protected $table = 'students';

    protected $primaryKey = 'MSSV'; // Khóa chính

    protected $casts = [
        'MSSV' => 'string',
        'IdSubject' => 'string'
    ];

    // Các cột có thể được gán đại trà
    protected $fillable = [
        'MSSV', 'LastName', 'FirstName', 'BirthDay', 'Gender', 'Avatar', 'IdSubject'
    ];

    // Định nghĩa quan hệ với bảng Subject
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'IdSubject', 'IdSubject');
    }
}

