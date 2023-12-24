@extends('layout')

@section('content')

<div class="bg-gray-100 border border-gray-200 p-11 rounded">
    <header>
      <h1 class="text-3xl text-center font-bold my-6 uppercase">
        Manage Books
      </h1>
    </header>

    <table class="w-full table-auto rounded-sm">
      <tbody>
        @unless($books->isEmpty())
        @foreach($books as $book)
        <tr class="border-gray-300">
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <a href="/books/{{$book->id}}"> {{$book->title}} </a>
            </br>
            Author: {{$book->author->name}} {{$book->author->surname}}
          </td>
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <a href="/books/{{$book->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                class="fa-solid fa-pen-to-square"></i>
              Edit</a>
          </td>
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <form method="POST" action="/books/{{$book->id}}">
              @csrf
              @method('DELETE')
              <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
        @else
        <tr class="border-gray-300">
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <p class="text-center">No Books Found</p>
          </td>
        </tr>
        @endunless

      </tbody>
    </table>
@endsection
