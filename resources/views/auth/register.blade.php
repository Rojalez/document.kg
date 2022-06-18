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
            <div class="relative flex flex-col min-w-0 rounded-xl break-words shadow-lg bg-opacity-30 bg-white">
                <div class="flex-auto p-6">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4 flex flex-col ">
                            <label for="name" class="text-sm font-light pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal">Имя</label>

                            <div class=" pr-4 pl-4">
                                <input id="name" type="text" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal text-gray-800 focus:outline-none rounded bg-opacity-30 bg-white" @error('name') @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="hidden mt-1 text-sm text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 flex flex-col ">
                            <label for="email" class="font-light text-sm pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal ">Email</label>

                            <div class=" pr-4 pl-4">
                                <input id="email" type="email" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal text-gray-800 focus:outline-none rounded bg-opacity-30 bg-white" @error('email')  @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="hidden mt-1 text-sm text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 flex flex-col ">
                            <label for="password" class="text-sm font-light pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal">Пароль</label>

                            <div class=" pr-4 pl-4">
                                <input id="password" type="password" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal text-gray-800 focus:outline-none rounded bg-opacity-30 bg-white" @error('password') @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="hidden mt-1 text-sm text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 flex flex-col ">
                            <label for="password-confirm" class="text-sm pr-4 font-light pl-4 pt-2 pb-2 mb-0 leading-normal">Подтверждение пароля</label>

                            <div class="pr-4 pl-4">
                                <input id="password-confirm" type="password" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal text-gray-800 focus:outline-none rounded bg-opacity-30 bg-white" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-4 flex flex-wrap">
                            <div class="md:w-1/2 pr-4 pl-4 md:mx-1/3">
                                <button type="submit" class="inline-block align-middle text-center duration-300 ease-linear select-none font-normal rounded-full focus:outline-none py-2 px-4 bg-blue-500 text-white hover:bg-blue-600">
                                    Регистрация
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
