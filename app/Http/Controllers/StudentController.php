<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function student(){
        // $std = Student::find($id);
        $user = Auth::user(); // รับข้อมูลผู้ใช้ที่ล็อกอินอยู่
        $student = $user; // ดึงข้อมูล student ของผู้ใช้ที่ล็อกอินอยู่
        return view('Student',compact('student')); //ดึงค่ามาจาก id ไม่มีสิทธิ์การเข้าถึงคะแนนดูได้อย่างเดียว
    }
}
