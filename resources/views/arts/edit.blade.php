@extends('layouts.app')


@section('content')
   
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Edit Art Profile
            </h1>
        </div>

        <div class="flex justify-center pt-20">
            <form action="/cars/{{ $car->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="block">
                    

                    <input type="text"
                    class="block shadow-5xk mb-10 p-2 w-80 italic placeholder-gray-400"
                    name = "name"
                    placeholder="Title">

                    <input type="text"
                    class="block shadow-5xk mb-10 p-2 w-80 italic placeholder-gray-400"
                    name = "release"
                    placeholder="Release">

                    <input type="text"
                    class="block shadow-5xk mb-10 p-2 w-80 italic placeholder-gray-400"
                    name = "writer"
                    placeholder="Writer">

                    <input type="text"
                    class="block shadow-5xk mb-10 p-2 w-80 italic placeholder-gray-400"
                    name = "type"
                    placeholder="Type">

                    <input type="text"
                    class="block shadow-5xk mb-10 p-2 w-80 italic placeholder-gray-400"
                    name = "description"
                    placeholder="Description">

                    <input type="file"
                    class="block shadow-5xk mb-10 p-2 w-80 italic placeholder-gray-400"
                    name = "image">

                    <button type="submit" 
                        class="bg-green-700 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                        Submit
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection