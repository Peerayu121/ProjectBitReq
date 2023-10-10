<?php

namespace App\Http\Controllers;
use App\Models\Classroom;
use App\Models\Classhasstudent;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function stdlist()
    {
        $students = Student::all();
        $classhasstd = Classhasstudent::all();
        $session=session('teacher_id');
        $teacher = Teacher::where('kkumail', $session)->first();
        return view('class', compact('students','teacher','classhasstd'));
    }

    public function deletestd()
{
    $students = Student::find();

    $students->delete(); // โดยการใช้ delete() method ของ Eloquent Model จะทำ Soft Delete
    return redirect()->route('class');

}

public function exportStudents()
{
    return Excel::download(new StudentsExport, 'students.xlsx');
}

public function stdscore()
{
    $students = Student::all();
    $session=session('teacher_id');
    $teacher = Teacher::where('kkumail', $session)->first();
    return view('score', compact('students','teacher'));
}

public function addstd()
{    

    $students = Student::all(); 
    $students = collect([]); 
    $session = session('teacher_id');
    $teacher = Teacher::where('kkumail', $session)->first();
    return view('addstudent', compact('students', 'teacher'));
}


public function searchstd(Request $request)
{
    $email = $request->input('filterstd');
    $session = session('teacher_id');
    $teacher = Teacher::where('kkumail', $session)->first();
    $students = Student::where('kkumail', $email)->get(); // หรือใช้ ->paginate(10); หากต้องการให้ได้ Collection ที่สามารถใช้ paginate ได้
  
    return view('addstudent', compact('students', 'teacher'));
}
public function addStudentToClass($student_id)
{
    $session = session('teacher_id');
    $teacher = Teacher::where('kkumail', $session)->first();
    $student = Student::find($student_id);

    if ($teacher && $student) {
        // พบครูและนักศึกษา ทำการเพิ่มนักศึกษาลงในรายวิชาของครู
        $classhasstudent = new Classhasstudent();
        $classhasstudent->idClassroom = $teacher->classroom->id; // กำหนด idClassroom จากครู
        $classhasstudent->idStudent = $student->id;
        $classhasstudent->save();

        // ส่งข้อความหรือแจ้งเตือนหากต้องการ
        // ...

        // ส่งกลับไปยังหน้าเว็บที่คุณต้องการ
        return redirect()->route('addstudent')->with('success', 'เพิ่มนักศึกษาเรียบร้อยแล้ว');
    } else {
        // ครูหรือนักศึกษาไม่พบ
        // ส่งข้อความหรือแจ้งเตือนหากต้องการ
        // ...

        // ส่งกลับไปยังหน้าเว็บที่คุณต้องการ
        return redirect()->route('addstudent')->with('error', 'ไม่สามารถเพิ่มนักศึกษาได้');
    }
}




public function talist()
{
    $students = Student::all();
    $session=session('teacher_id');
    $teacher = Teacher::where('kkumail', $session)->first();
    return view('talist', compact('students','teacher'));
}

public function addta()
{
    $students = Student::all();
    $students = collect([]); 
    $session=session('teacher_id');
    $teacher = Teacher::where('kkumail', $session)->first();
    return view('addta', compact('students','teacher'));
}

public function searchta(Request $request)
{
    $email = $request->input('filterstd');
    $session = session('teacher_id');
    $teacher = Teacher::where('kkumail', $session)->first();
    $students = Student::where('kkumail', $email)->get(); // หรือใช้ ->paginate(10); หากต้องการให้ได้ Collection ที่สามารถใช้ paginate ได้
  
    return view('addstudent', compact('students', 'teacher'));
}

public function createLab(Request $request, $id)
{
    $fullScoreLab = 10;
    $room = Classroom::find($id);
    $labs = new Lab;
    $labs->nameLab = $request->newLabName;
    $labs->fullscore = $fullScoreLab;
    $labs->room_id = $room->id;
    $labs->save();
    return redirect()->route('score', ['id' => $room->id]);
}

}