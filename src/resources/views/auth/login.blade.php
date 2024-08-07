<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('メールアドレス') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('パスワード') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('アカウントを記憶させる') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('パスワードを忘れた方はコチラ') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('ログイン') }}
                </x-button>
            </div>
        </form>
        <ul class="information" style="margin-top:50px; padding:10px; border:2px solid gray;">
            <li>ポートフォリオなのでログイン用のアカウントは</li>
            <li style="padding-bottom:30px;">次の情報をお使いください</li>
            <li>メールアドレス</li>
            <li style="color:blue">test@gmail.com</li>
            <li>パスワード</li>
            <li style="color:blue">testtest</li>
        </ul>

    </x-authentication-card>
</x-guest-layout>