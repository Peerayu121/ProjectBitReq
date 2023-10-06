<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request,$id){
        $std = Student::find($id);
        view('Student',compact('std')); //ดึงค่ามาจาก id ไม่มีสิทธิ์การเข้าถึงคะแนนดูได้อย่างเดียว
    }
}
