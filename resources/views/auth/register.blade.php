<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('./css/register.css') }}">
    <style>
        body {
            background-color: #f9f6e3;
        }
    </style>
</head>

<body>
    <div class="my-nav">
    </div>
    <div>
        <div class="form1">
            <h4>สมัครสมาชิก</h4>
            <form method="POST" action="{{ route('register') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="fname">
                    <input type="text" id="fname" name="fname" required placeholder="ชื่อ">
                </div><br>
                <div class="lame">
                    <input type="text" id="lname" name="lname" required placeholder="นามสกุล">
                </div><br>

                <div>
                    <input id="name" class="block mt-1 w-full" type="text" name="name"
                        value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="ชื่อผู้ใช้">
                </div><br>
                <div class="mt-4">
                    <input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" placeholder="รหัสผ่าน">
                </div><br>
                <div class="mt-4">
                    <input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" placeholder="ยืนยันรหัสผ่าน">
                </div><br>
                <div class="mt-4">
                    <input id="email" class="block mt-1 w-full" type="email" name="email"
                        value="{{ old('email') }}" required autocomplete="username" placeholder=KKUMAIL>
                </div><br>
                <div class="stdid">
                    <input type="text" id="stdid" name="stdid" required autocomplete="stdid"
                        placeholder="รหัสนักศึกษา">
                </div><br>



                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <label for="terms">
                            <div class="flex items-center">
                                <input type="checkbox" name="terms" id="terms" required>
                                <div class="ml-2">
                                    I agree to the <a target="_blank" href="{{ route('terms.show') }}"
                                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms
                                        of Service</a> and <a target="_blank" href="{{ route('policy.show') }}"
                                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy
                                        Policy</a>
                                </div>
                            </div>
                        </label>
                    </div>
                @endif

                {{-- <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        Already registered?
                    </a> --}}

                <button class="bttregis" type="submit">สมัครสมาชิก</button>
        </div>
        </form>
    </div>
    </div>


</body>

</html>
