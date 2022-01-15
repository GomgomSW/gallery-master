@extends('layouts.app')

@section('content')

<div class="m-auto w-4/5 py-24">
    <div class="text-center">
       
        <h1 class="text-5xl uppercase bold">
            {{ $art->name }}
        </h1>
        <br>
        <img src="{{ asset('images/' . $art->image_path) }}" 
        class="w-4/8 mb-8 shadow-xl m-auto"
        alt="">
    </div>

    <div class="py-10 text-center">   

            <div class="m-auto">
                <div class="m-auto">
                    <span class="uppercase text-red-700 font-bold text-xs italic">
                        Release: {{ $art -> release }}
                    </span>

                    
                    <p class="text-center">
                        Type : {{ $art ->type }}
                    </p>

                    <p class="text-center">
                        Type : {{ $art ->writer }}
                    </p>

                    

                    
                    <p class="text-lg text-gray-700 py-6">
                        {{ $art -> description }}
                    </p>

                    <hr class="mt-4 mb-8">
             </div>
        </div>
 </div>

@endsection