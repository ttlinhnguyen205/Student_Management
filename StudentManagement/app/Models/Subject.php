<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu tên bảng không phải là số nhiều của tên model
    protected $table = 'subjects';

    protected $primaryKey = 'IdSubject'; // Khóa chính
    protected $casts = [
        'IdSubject' => 'string',
    ];

    // Các cột có thể được gán đại trà
    protected $fillable = [
        'IdSubject', 'NameSubject', 'Note', 'Deleted', 'start_date', 'end_date'
    ];

    // Định nghĩa quan hệ với bảng students
    public function students()
    {
        return $this->hasMany(Student::class, 'IdSubject', 'IdSubject');
    }
}
