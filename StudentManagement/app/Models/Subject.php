<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';
    protected $primaryKey = 'IdSubject'; // Khóa chính
    public $incrementing = false; // Vì IdSubject không phải auto-increment
    protected $keyType = 'string'; // Khóa chính là chuỗi

    protected $casts = [
        'IdSubject' => 'string',
    ];

    protected $fillable = [
        'IdSubject', 'NameSubject', 'Note', 'Deleted', 'start_date', 'end_date'
    ];

    // Định nghĩa quan hệ với bảng students
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_subject', 'IdSubject', 'MSSV');
    }
}

