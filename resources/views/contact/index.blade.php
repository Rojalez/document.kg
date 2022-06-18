<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Связь с нами</title>
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/bootstrap.min.js') }}" defer></script> --}}
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/tailwind.css')}}" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/main.css') }}" rel="stylesheet"> --}}

</head>

<body class="font-sans bg-gray-900">
    @include('main.menu')
    <div class="px-2">
        <div class='container mx-auto my-64 w-full rounded-2xl bg-opacity-50 lg:max-w-4xl   bg-white p-6'>
            @if (\Session::has('success'))
            <div class="relative px-3 py-3 mb-4 rounded text-orange-800 " role="alert">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="flex-auto p-6">
                <form action='/contact' method='post'>
                    <div class="mb-4">
                        <input name='name' type="text" class=" appearance-none w-full py-2 px-2 mb-1 leading-normal font-light text-sm text-gray-800 focus:outline-none rounded" id="name" placeholder="Введите имя" required
                            style="background: #f8f9fa;">
                    </div>
                    <div class="mb-4">
                        <input name='email' type='email' class=" appearance-none w-full py-2 px-2 mb-1 leading-normal font-light text-sm text-gray-800 focus:outline-none rounded" placeholder="Введите почтовый адрес" required
                            style="background: #f8f9fa;">
                    </div>
                    <div class="mb-4">
                        <textarea name='text' class="appearance-none w-full py-2 px-2 mb-1 leading-normal font-light text-sm text-gray-800 focus:outline-none rounded" id="message" rows="6" required
                            placeholder="Введите сообщение здесь" style="background: #f8f9fa;"></textarea>
                    </div>
                    <div class="mx-auto flex justify-end">
                        <button type="submit" class="align-middle text-center rounded-full py-2 px-4 focus:outline-none bg-blue-500 transition  duration-300 ease-linear text-white hover:bg-blue-600">Отправить</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
    @include('main.footer')

</body>

</html>