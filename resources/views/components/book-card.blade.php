@props(['book'])

<div class="bg-gray-50 border border-gray-200 rounded p-6">
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$book->picture ? asset('storage/' . $book->picture) : asset('/images/no-image-book.png')}}" alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/books/{{$book->id}}">{{$book->title}}</a>
            </h3>
            <h2>Author: {{$book->author->name}} {{$book->author->surname}} </h2>
            <x-book-genre :genreCsv="$book->genre" />
        </div>
    </div>
</div>