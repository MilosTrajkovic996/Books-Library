@extends('layout')

@section('content')
<div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Edit a Book
        </h2>
        <p class="mb-4">Edit: {{$book->title}}</p>
    </header>

    <form method="POST" action="/books/{{$book->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="title" class="inline-block text-lg mb-2"
                >Book Title</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="title"
                placeholder="Example: Senior Laravel Developer"
                value="{{$book->title}}"
            />
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="genre" class="inline-block text-lg mb-2">
                genre (Comma Separated)
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="genre"
                placeholder="Example: Laravel, Backend, Postgres, etc"
                value="{{$book->genre}}"
            />
            @error('genre')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="picture" class="inline-block text-lg mb-2">
                Book Picture
            </label>
            <input
                type="file"
                class="border border-gray-200 rounded p-2 w-full"
                name="picture"
            />
            <img
                class="w-48 mr-6 mb-6"
                src="{{$book->picture ? asset('storage/' . $book->picture) : asset('/images/no-image-book.png')}}" alt=""
                alt=""
            />
        </div>

        <div class="mb-6">
        <label for="description" class="inline-block text-lg mb-2">
          Book Description
        </label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
          placeholder="Include tasks, requirements, salary, etc">{{$book->description}}</textarea>

        @error('description')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="text-center">
            <p class="mb-4">Edit Author of the book</p>
        </div>

        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2"
                >Author Name</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="name"
                value="{{$book->author->name}}"
            />
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2"
                >Author Surname</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="surname"
                value="{{$book->author->surname}}"
            />
            @error('surname')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2"
                >Author email</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="email"
                value="{{$book->author->email}}"
            />
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button
                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
            >
                Edit Book
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>
</div>
@endsection

