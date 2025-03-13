<h2>{{ $user->name }}'s Booklist</h2>
@foreach($books as $book)
    <p>{{ $book->title }} - {{ $book->author }}</p>
@endforeach
