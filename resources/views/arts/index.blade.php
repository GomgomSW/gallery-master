@extends('layouts.app')

@section('content')

    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-4xl bold uppercase">
                Lab Art
            </h1>
        </div>

        @if (Auth::user())
        <div class="pt-10">
            <a href="arts/create"
                class="border-b-2 pb-2 border-dotted italic text-gray-500">
                Input Art to Data &rarr;
            </a>
        </div>
    @endif
    

        <div class="w-5/6 py-20">
            {{-- Buttom --}}
            @foreach ($arts as $art)
            <div class="m-auto">
                @if (isset(Auth::user()->id) && Auth::user()->id == $art->user_id)    
                    <div class="m-auto">
                        <a class="border-b-2 pb-2 border-dotted italic text-green-500"
                            href="arts/{{ $art->id }}/edit">

                            Edit &rarr;
                        </a>

                        <form action="/arts/{{ $art->id }}" class="pt-4" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class="border-b-2 pb-2 border-dotted italic text-red-500">
                                Delete &rarr;

                            </button>
                        </form>
                    </div>
                @endif

                
                <div class="m-auto">
                    <img src="{{ asset('images/'. $art->image_path) }}" class="w-40 mb-8 shadow-xl" alt="">
                    <span class="uppercase text-red-700 font-bold text-xs italic">
                        Founded: {{ $art -> release }}
                    </span>

                    <h2 class="text-gray-700 text-5xl hover:text-gray-500">
                        <a href="/arts/{{ $art->id }}">
                            {{ $art -> name }}
                        </a>
                    </h2>
                    
                    <h2 class="text-gray-700 text-5xl hover:text-gray-500">
                        <a href="/arts/{{ $art->id }}">
                            {{ $art -> type }}
                        </a>
                    </h2>
                    
                    <p class="text-lg text-gray-700 py-6">
                        {{ $art -> writer }}
                    </p>

                    <hr class="mt-4 mb-8">
                </div>
            </div>
        @endforeach

@endsection