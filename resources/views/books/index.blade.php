@extends('layout')

@section('content')
@include('partials/_hero')
@include('partials/_search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

@if(count($books) == 0)
<p>No books found</p>
@endif

@foreach($books as $book)
    <x-book-card :book="$book" />
@endforeach
</div>

<div class="mt-6 p-4">
    {{$books->links()}}
</div>
@endsection