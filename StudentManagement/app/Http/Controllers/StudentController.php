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
        $students = Student::with('subjects')->get();
        return view('students.index', compact('students'));
    }

    // Hiển thị form tạo sinh viên
    public function create()
    {
        $subjects = Subject::all();
        return view('students.create', compact('subjects'));
    }
    //Đăng kí môn học 
    public function assignSubjects(Request $request, $MSSV)
    {
        $student = Student::findOrFail($MSSV);
        $subjects = $request->input('subjects'); // Lấy danh sách môn học từ form

        $student->subjects()->sync($subjects); // Gán môn học cho sinh viên

        return redirect()->back()->with('success', 'Cập nhật môn học thành công!');
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
            'IdSubject' => 'required|array',
            'IdSubject.*' => 'exists:subjects,IdSubject',
        ]);
    
        // Chuyển Gender thành chữ hoa đầu (Male, Female)
        $validatedData['Gender'] = ucfirst($validatedData['Gender']);
    
        // Lưu ảnh đại diện
        $avatarPath = $request->hasFile('Avatar') 
            ? $request->file('Avatar')->store('avatars', 'public') 
            : 'avatars/profile.png';
    
        // Tạo sinh viên
        $student = Student::create([
            'MSSV' => $validatedData['MSSV'],
            'LastName' => $validatedData['LastName'],
            'FirstName' => $validatedData['FirstName'],
            'BirthDay' => $validatedData['BirthDay'],
            'Gender' => $validatedData['Gender'],
            'Avatar' => $avatarPath,
        ]);
    
        // Gán môn học cho sinh viên
        if (!empty($validatedData['IdSubject'])) {
            $student->subjects()->sync($validatedData['IdSubject']);
        }
    
        return redirect()->route('students.index')->with('success', 'Sinh viên đã được tạo thành công.');
    }
    
    // Hiển thị form sửa sinh viên
    public function edit(Student $student)
    {
        $subjects = Subject::all();
        $selectedSubjects = $student->subjects->pluck('IdSubject')->toArray(); // Lấy danh sách môn học của sinh viên
    
        return view('students.edit', compact('student', 'subjects', 'selectedSubjects'));
    }

    // Cập nhật sinh viên
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'LastName' => 'required|string|max:255',
            'FirstName' => 'required|string|max:255',
            'BirthDay' => 'required|date|date_format:Y-m-d|beforeOrEqual:'.now()->subYears(18)->toDateString(),
            'Gender' => 'required|in:male,female',
            'Avatar' => 'nullable|image|max:2048',
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,IdSubject',
        ]);
    
        // Xử lý ảnh đại diện
        if ($request->hasFile('Avatar')) {
            if ($student->Avatar) {
                Storage::disk('public')->delete($student->Avatar);
            }
            $avatarPath = $request->file('Avatar')->store('avatars', 'public');
        } else {
            $avatarPath = $student->Avatar;
        }
    
        // Cập nhật thông tin sinh viên
        $student->update([
            'LastName' => $request->LastName,
            'FirstName' => $request->FirstName,
            'BirthDay' => $request->BirthDay,
            'Gender' => $request->Gender,
            'Avatar' => $avatarPath,
        ]);
    
        // Cập nhật danh sách môn học
        $student->subjects()->sync($request->subjects);
    
        return redirect()->route('students.index')->with('success', 'Cập nhật sinh viên thành công.');
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
        $student = Student::with('subjects')->where('MSSV', $id)->firstOrFail();
        return view('students.info', compact('student'));
    }
    
}