<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    public function run()
    {
        // เรียกข้อมูลผู้ใช้ที่มีค่า status เป็น "student"
        $users = User::where('status', 'student')->get();

        // สร้างข้อมูล student โดยใช้ค่า id ของผู้ใช้
        foreach ($users as $user) {
            Student::create([
                'id' => $user->id, // ใช้ค่า id ของผู้ใช้เป็น id ของ student
                'id_std',
                'email' => $user->email,
                'password' => Hash::make($user->password),
                'name',
                'class'

                // เพิ่มข้อมูลอื่น ๆ ของ student ตามต้องการ
            ]);
        }


    }
}
