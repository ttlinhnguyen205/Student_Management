<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';  // Định nghĩa tên bảng
    protected $primaryKey = 'MSSV'; // Định nghĩa khóa chính là MSSV
    public $incrementing = false;   // Vì MSSV là string, không phải auto-increment
    protected $keyType = 'string';  // MSSV là kiểu string

    protected $fillable = [
        'MSSV', 'LastName', 'FirstName', 'BirthDay', 'Gender', 'Avatar'
    ];

    public function subjects()
{
    return $this->belongsToMany(Subject::class, 'student_subject', 'MSSV', 'IdSubject');
}

    
}

