@extends('forum.forum')
@section('header')
<title>Форум юридической помощи</title>
@endsection
@section('content')
        <div x-data="{ open: false }"  class="container mx-auto mt-20">
            <nav>
                <ol class="flex flex-wrap list-reset pt-3 pb-3 py-4 px-4 mb-4 bg-gray-100 rounded-md">
                    <li class="inline-block px-2 py-2 text-gray-700"><a href="/"><img src='img/breadcrumb-logo.png' style='height:23px;widht:23px;'></a></li>
                    <li class="inline-block px-2 py-2 text-gray-700 text-sm font-light active" aria-current="page">Форум</li>
                </ol>
            </nav>     
@include('forum.create-question')
@include('main.side-banner-mob')  
            <div class="bg-blue-100 my-2 rounded w-full">
                <p class="text-gray-600 p-6"><i class="fal fa-info-circle text-blue-600 mr-1"></i>Присоединяйтесь к обсуждениям. Будьте вежливы и следуйте правилам форума. <a href="/forum/rules" class="text-blue-600">Узнать больше о правилах форума > </a></p>
            </div>
            @include('forum.top-lawyers')
            <!-- forum questions -->
            <div class="flex flex-col lg:flex-row mt-4 lg:space-x-2 space-x-0">
                <div class="flex space-y-2  flex-wrap  content-start h-full w-full items-start justify-start">
                <div class="container mx-auto my-4">
                    <h2 class='text-2xl'>Последние вопросы</h2>
                    <div class="flex flex-wrap">
                        {{-- @include('main.side-banner-mob') --}}
                            <!-- start questions -->
                            @foreach ($questions as $question)
                                <div class="flex flex-col my-2 min-w-full mr-2 rounded-md shadow-md border border-gray-50 bg-white">
                                    <div class="flex-auto p-6 pl-2">
                                        <a href="/forum/{{$question->slug}}">
                                            <h5 class="mb-3  text-blue-500 hover:text-blue-600 transition ease-in-out duration-500">{{$question->question}}</h5>
                                        </a>
                                        <p class="mb-0 text-sm font-light">{{$question->text}}</p>
                                        <small class="text-gray-700 font-light">{{$question->created_at}}</small>
                                        <small
                                        class="p-1 text-gray-700"><span class="mr-1">Ответов:</span><span>{{$question->answers->count()}}</span></small>
                                        <div class='flex flex-wrap  mt-2'>
                                        @foreach($question->tag as $tag)
                                        {{-- <a href="/forum/category/{{$tag->name}}"> --}}
                                        <kbd class='mr-1 my-1 bg-gray-100 px-2 py-1 text-xs font-light rounded-sm font-sans'>{{$tag->name}}</kbd>
                                        {{-- </a> --}}
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                                {{ $questions->links() }}
                           
                            <!-- Редактировать постранисную навигацию по пути
                                resources/views/vendor/pagination/default.blade.php -->
                    </div>
                </div>
            </div>
                @include('main.side-banner-desktop-1')

            </div>
<!-- forum questions end -->
</div>
@endsection
