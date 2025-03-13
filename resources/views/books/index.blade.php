@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <center><h2 class="text-xl font-bold mb-4">Book List</h2></center>

    <form action="{{ route('books.search') }}" method="GET" class="mb-4">
        <input type="text" name="query" placeholder="Search by Title or ISBN" 
               class="border px-2 py-1 rounded">
        <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded">Search</button>
        <button class="bg-blue-500 text-white px-4 py-1 rounded" style="float:right"><a href="/books/create">Add Book</a></button>

    </form>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">Title</th>
                <th class="border border-gray-300 px-4 py-2">Author</th>
                <th class="border border-gray-300 px-4 py-2">ISBN</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td class="border border-gray-300 px-4 py-2"><a href="/book/{{ $book->id }}" class="text-blue-500 hover:underline">{{ $book->title }}</a></td>
                    <td class="border border-gray-300 px-4 py-2">{{ $book->author }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $book->isbn }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                        No books found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
