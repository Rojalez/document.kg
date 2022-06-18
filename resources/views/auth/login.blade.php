@extends('layouts.app')
<style>
	body {
		background: rgba(0, 0, 0, 0.809);
	}
</style>
@section('content')
<div class="container mx-auto my-24 sm:px-4">
    <div class="flex flex-wrap  justify-center">
        <div class="lg:w-1/2 w-full pr-4 pl-4">
            <div class=" relative flex flex-col min-w-0 rounded bg-opacity-30 break-words shadow-lg bg-white">
                <div class="flex-auto p-6">
                    <form method="POST" class="" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4 flex flex-col w-full mx-auto">
                            <label for="email" class="w-full font-light text-sm pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal ">{{ __('E-Mail адрес') }}</label>

                            <div class="w-full pr-4 pl-4">
                                <input id="email" type="email" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-opacity-100 text-gray-100 placeholder-gray-300 font-light focus:outline-none rounded" @error('email')  @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="hidden mt-1 text-sm text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 flex flex-col w-full mx-auto">
                            <label for="password" class="w-full text-sm font-light pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal">{{ __('Пароль') }}</label>

                            <div class="w-full pr-4 pl-4">
                                <input id="password" type="password" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white bg-opacity-30 text-gray-100 placeholder-gray-300 font-light focus:outline-none rounded    " @error('password') ] @enderror" name="password" required >

                                @error('password')
                                    <span class="hidden mt-1 text-sm text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 flex flex-col w-full mx-auto">
                            <div class="w-full pr-4 pl-4">
                                <div class="relative block mb-2">
                                    <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="text-sm font-light" for="remember">
                                        {{ __('Запомнить меня') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 flex flex-col w-full mx-auto">
                            <div class="w-full pr-4 pl-4">
                                <button type="submit" class="inline-block ring-2 ring-blue-500 mr-1 align-middle text-center duration-300 ease-linear select-none font-normal rounded-full focus:outline-none py-2 px-4 bg-blue-500 text-white hover:bg-blue-600">
                                    {{ __('Войти') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="inline-block align-middle ring-2 ring-blue-400 text-center duration-300 ease-linear select-none font-normal rounded-full focus:outline-none py-2 px-3 text-white " href="{{ route('password.request') }}">
                                        {{ __('Забыли пароль?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
