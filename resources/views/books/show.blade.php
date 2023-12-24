@extends('layout')

@section('content')
@include('partials/_search')

<a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <div class="flex flex-col items-center justify-center text-center">
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{$book->picture ? asset('storage/' . $book->picture) : asset('/images/no-image-book.png')}}" alt=""
                    alt=""
                />

                <h3 class="text-2xl mb-2">{{$book->title}}</h3>
                <h2>Author: {{$book->author->name}} {{$book->author->surname}} </h2>
                <x-book-genre :genreCsv="$book->genre" />
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Book Description
                    </h3>
                    <div class="text-lg space-y-6">
                        {{$book->description}}

                        <a
                            href="mailto:{{$book->author->email}}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-envelope"></i>
                            Contact Author</a
                        >
                 
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="mt-4 p-2 flex space-x-6">
            <a href="/books/{{$book->id}}/edit">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>

            <form method="POST" action="/books/{{$book->id}}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
        </div> -->
    </div>
@endsection
