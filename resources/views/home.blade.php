@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Dashboard
            </header>

            <div class="w-full p-6">
                <p class="text-gray-700">
                    You are logged in!
                </p>
            </div>
        </section>
        <br>
        {{-- Buttom --}}
        @foreach ($arts as $art)
        <div class="flex flex-wrap -mx-4 pb-10">
            <div class="w-80 md:w-1/2 xl:w-1/3 px-4 mx-10 ">
                <div class="bg-white rounded-lg overflow-hidden mb-10">
                    <img src="{{ asset('images/' . $art->image_path) }}" 
                        class="w- m-auto"
                        alt="">
                    
                    <h3 class="mt-6 text-sm text-gray-500">
                    <a href="#">
                        <span class="absolute inset-0"></span>
                        {{ $art -> writer }}
                    </a>
                    </h3>
                    <p class="text-base font-semibold text-gray-900">
                        <a href="/arts/{{ $art->id }}">
                                {{ $art -> name }}
                        </a>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
   
</main>

@endsection
