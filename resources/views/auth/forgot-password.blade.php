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
    <div class="my-navforgot">

    </div>
    <div class="container2">
        
    
        <div class="forgot">
            <p>ลืมรหัสผ่าน</p>
        </div>
    
        <div class="mb-4 text-sm text-gray-600">
            {{ __('กรุณากรอกอีเมลเพื่อรับรหัสยืนยันในการรีเซ็ตรหัสผ่าน') }}
        </div>
    
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
    
        <x-validation-errors class="mb-4" />
    
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
    
            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>
    
            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('ถัดไป') }}
                </x-button>
            </div>
        </form>
    </div>

    

</body>

</html>
