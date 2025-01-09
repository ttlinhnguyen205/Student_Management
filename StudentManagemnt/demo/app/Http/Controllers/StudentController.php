<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    // Hiển thị danh sách sinh viên
    public function index()
    {
        $students = Student::with('subject')->get();
        return view('students.index', compact('students'));
    }

    // Hiển thị form tạo sinh viên
    public function create()
    {
        $subjects = Subject::all();
        return view('students.create', compact('subjects'));
    }

    // Lưu sinh viên mới
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'MSSV' => 'required|string|size:8|unique:students',
            'LastName' => 'required|string|max:255',
            'FirstName' => 'required|string|max:255',
            'BirthDay' => 'required|date|date_format:Y-m-d|beforeOrEqual:'.now()->subYears(18)->toDateString(),
            'Gender' => 'required|in:male,female',
            'Avatar' => 'nullable|image|max:2048',
            'IdSubject' => 'required|exists:subjects,IdSubject',
        ]);

        if ($request->hasFile('Avatar')) {
            $avatarPath = $request->file('Avatar')->store('avatars', 'public');
            $validatedData['Avatar'] = $avatarPath;
        } else {
            $validatedData['Avatar'] = 'avatars/profile.png';
        }

        Student::create($validatedData);

        return redirect()->route('students.index')->with('success', 'Sinh viên đã được tạo thành công.');
    }

    // Hiển thị form sửa sinh viên
    public function edit(Student $student)
    {
        $subjects = Subject::all();
        return view('students.edit', compact('student', 'subjects'));
    }

    // Cập nhật sinh viên
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'MSSV' => 'required|integer|unique:students,MSSV,' . $student->MSSV . ',MSSV',
            'LastName' => 'required|string|max:255',
            'FirstName' => 'required|string|max:255',
            'BirthDay' => 'required|date|date_format:Y-m-d|beforeOrEqual:'.now()->subYears(18)->toDateString(),
            'Gender' => 'required|in:male,female',
            'Avatar' => 'nullable|image|max:2048',
            'IdSubject' => 'required|exists:subjects,IdSubject',
        ]);

        $avatarPath = $student->Avatar;

        if ($request->hasFile('Avatar')) {
            if ($student->Avatar) {
                Storage::disk('public')->delete($student->Avatar);
            }

            try {
                $avatarPath = $request->file('Avatar')->store('avatars', 'public');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['Avatar' => 'Có lỗi xảy ra khi tải lên hình đại diện: ' . $e->getMessage()]);
            }
        }

        $updateSuccess = $student->update($request->except('Avatar') + ['Avatar' => $avatarPath]);

        if (!$updateSuccess) {
            return redirect()->back()->withErrors(['update' => 'Có lỗi xảy ra khi cập nhật thông tin sinh viên.']);
        }

        return redirect()->route('students.index')->with('success', 'Sinh viên đã được tạo thành công.');
    }

    // Xóa sinh viên
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Sinh viên đã được xóa thành công.');
    }

    // Hiển thị sinh viên theo MSSV
    public function show($id)
    {
        $students = Student::where('MSSV', $id)->get();
        return view('students.info', compact('students'));
    }
}
