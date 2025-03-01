<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Rules\NoVietnameseCharacters;

class SubjectController extends Controller
{
    // Hiển thị danh sách môn học
    public function index()
    {
        $subjects = Subject::withCount('students')->get(); // Sử dụng withCount để lấy số lượng sinh viên
        return view('subjects.index', compact('subjects'));
    }

    // Hiển thị form tạo môn học
    public function create()
    {
        return view('subjects.create');
    }

    // Lưu môn học mới
    public function store(Request $request)
{
    $request->validate([
        'IdSubject' => ['required', 'string', 'size:8', new NoVietnameseCharacters], // Đảm bảo đúng 8 ký tự
        'NameSubject' => 'required|string|max:255',
        'Note' => 'nullable|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    // Kiểm tra xem IdSubject đã tồn tại trong cơ sở dữ liệu chưa
    $existingSubject = Subject::where('IdSubject', $request->IdSubject)->first();
    if ($existingSubject) {
        return redirect()->back()->withErrors(['IdSubject' => 'Mã môn học này đã tồn tại. Vui lòng nhập mã môn học khác.']);
    }

    // Tạo môn học mới
    Subject::create([
        'IdSubject' => $request->IdSubject,
        'NameSubject' => $request->NameSubject,
        'Note' => $request->Note,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
    ]);
    
    return redirect()->route('subjects.index')->with('success', 'Môn học đã được tạo thành công.');
}

    // Hiển thị form sửa môn học
    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    // Cập nhật môn học
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'IdSubject' => ['required', 'string', 'size:8', new NoVietnameseCharacters], // Kiểm tra độ dài 8 ký tự
            'NameSubject' => 'required|string|max:255',
            'Note' => 'nullable|string',
        ]);

        $subject->update($request->all()); // Cập nhật thông tin môn học
        return redirect()->route('subjects.index')->with('success', 'Môn học đã được cập nhật thành công.');
    }

    // Xóa môn học
    public function destroy(Subject $subject)
    {
        if ($subject->students()->count() > 0) {
            // Nếu môn học có sinh viên, xóa tất cả sinh viên trước
            $subject->students()->delete();
        }
    
        $subject->delete(); // Xóa môn học
    
        return redirect()->route('subjects.index')->with('success', 'Môn học đã được xóa thành công.');
    }

    // Hiển thị sinh viên theo môn học
    public function show($id)
    {
        // Lấy môn học theo IdSubject
        $subject = Subject::findOrFail($id);
        // Lấy sinh viên theo IdSubject
        $students = Student::where('IdSubject', $subject->IdSubject)->get();

        return view('subjects.getStudent', compact('students', 'subject')); // Truyền danh sách sinh viên và môn học vào view
    }
}
