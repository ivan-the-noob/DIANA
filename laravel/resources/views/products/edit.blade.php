@extends('layouts.app')

@section('content')
    <h1 class="text-center">Edit Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Description:</label>
            <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Current Image:</label><br>
            <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->name }}"><br><br>
            <label>New Image:</label>
            <input type="file" name="img" class="form-control">
        </div>

        <div class="form-group">
            <label>Price:</label>
            <input type="number" name="price" value="{{ $product->price }}" class="form-control" required>
        </div>

        <button type="submit" class="btn button d-flex mx-auto">Update</button>
    </form>

    <style>
        form {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #000;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #fff;
        }

        input[type="text"], input[type="file"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            color: #333;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .button {
            padding: 10px 20px;
            background-color: #fff; 
            color: #000;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #000;
            border: 3px solid #fff !important; 
            color: #fff !important;
        }

        img{
            width: 100%;
            height: 250px;
        }
    </style>
@endsection
