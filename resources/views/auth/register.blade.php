<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="../../../img/logo.png">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <label for="name" >الاسم</label>
                <input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
            </div>
            <div class="mt-4">
                <label for="email"> البريد الالكتروني</label>

                <input id="email" class="block mt-1 w-full" type="email" name="email" required />
            </div>
            <div class="mt-4">
                <label for="password" >كلمة المرور</label>

                <input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <label for="password_confirmation">تأكييد كلمة المرور</label>

                <input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>
            <div>
                <label for="college_id" >الكلية</label>
                <input id="college_id" class="block mt-1 w-full" type="text" college_id="name" required autofocus />
            </div>


            <div class="flex items-center justify-center mt-4">
                <button class="btn btn-primary">تسجيل</button>
            </div>
                <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    لديك حساب؟
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
