<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('./css/styles.css') }}">
    <style>
        body {
            background-color: #f9f6e3;
        }
    </style>

</head>

<body>

    <div class="my-nav">

    </div>

    <div class="my-authentication-card">
        <div class="my-container">
            <div class="my-validation-errors mb-4">
                <!-- แสดงข้อความผิดพลาด (ถ้ามี) -->
            </div>

            @if (session('status'))
                <div class="my-status-message mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <div class="login">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h4>เข้าสู่ระบบ</h4>
                    <h5>กรุณากรอกอีเมลและรหัสผ่าน</h5>
                    <div class="my-email">
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" placeholder="อีเมล" required autofocus autocomplete="username" />
                    </div><br>

                    <div class="my-password">
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                            placeholder="รหัสผ่าน" required autocomplete="current-password" />
                    </div>


                    <div class="forgot">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('ลืมรหัสผ่าน?') }}
                            </a><br>
                        @endif
                    <div class="selected" required>
                        <input type="radio" name="radio" id="teacher"><p>อาจารย์</p>
                        <input type="radio" name="radio" id="TA"><p>ผู้ช่วยสอน</p>
                        <input type="radio" name="radio" id="std"><p>นักศึกษา</p>
                    </div>

                        <x-button class="loginbutton">
                            {{ __('เข้าสู่ระบบ') }}
                        </x-button>
                    </div>
                    <div class="notacc">
                        <a href="#">ยังไม่มีผู้ใช้ใช่หรือไม่ ?</a>
                    </div>
                    <div class="orr">
                        <hr><p>หรือ</p>
                    </div>
                    <div class="orr2">
                        <hr>
                    </div>

                    <center><img src={{ asset('public\image\🦆 icon _google_.png') }} alt=""></center>
                </form>
            </div>

        </div>
    </div>

</body>

</html>
