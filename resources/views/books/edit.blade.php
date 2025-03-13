@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="container d-flex justify-content-center align-items-center mt-20">
    <div class="col-md-6">
        <div class="card shadow-lg p-4 rounded-lg">
            <div class="card-header bg-warning text-black text-center">
                <h3 class="mb-0"><i class="fas fa-edit"></i> Edit Book</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('books.update', $book->id) }}">
                    @csrf
                    @method('PUT') <!-- Important for updating -->

                    <div class="mb-10"><br>
                        <label class="form-label fw-bold"><i class="fas fa-font me-2"></i> Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>

                        <label class="form-label fw-bold"><i class="fas fa-user me-2"></i> Author</label>
                        <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>

                        <label class="form-label fw-bold"><i class="fas fa-barcode me-2"></i> ISBN</label>
                        <input type="text" name="isbn" class="form-control" value="{{ $book->isbn }}" required>

                        <label class="form-label fw-bold"><i class="fas fa-align-left me-2"></i> Description</label>
                        <input type="text" name="description" class="form-control">{{ $book->description }}
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary fw-bold px-4 me-2">
                            <i class="fas fa-save"></i> Update Book
                        </button>
                        <a href="{{ route('books.index') }}" class="btn btn-secondary fw-bold px-4">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
