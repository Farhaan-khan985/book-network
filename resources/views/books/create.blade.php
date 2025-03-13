@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="container d-flex justify-content-center align-items-center mt-20">
    <div class="col-md-6">
        <div class="card shadow-lg p-4 rounded-lg">
            <div class="card-header bg-primary text-black text-center">
                <h3 class="mb-0"><i class="fas fa-book"></i> Add a New Book</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('books.store') }}">
                    @csrf
                    <div class="mb-10"><br>
                    <label class="form-label fw-bold"><i class="fas fa-font me-2"></i> Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter book title" required>
                    
                        <label class="form-label fw-bold"><i class="fas fa-user me-2"></i> Author</label>
                        <input type="text" name="author" class="form-control" placeholder="Enter author's name" required>
                    
                        <label class="form-label fw-bold"><i class="fas fa-barcode me-2"></i> ISBN</label>
                        <input type="text" name="isbn" class="form-control" placeholder="Enter ISBN number" required>
                    
                        <label class="form-label fw-bold"><i class="fas fa-align-left me-2"></i> Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Write a short description..." style="width:20%">
                        
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success fw-bold px-4 me-2">
                            <i class="fas fa-check"></i> Add Book
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
