@extends('layouts.app')

@section('content')
    <div class="d-flex w-100">
        <button type="button" class="btn add mb-4 d-flex justify-content-end" style="margin-left: auto;" data-bs-toggle="modal" data-bs-target="#addProductModal">
            Add Product
        </button>
    </div>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                <div class="card-header d-flex justify-content-end gap-2">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm edit"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
                    <img src="{{ asset('storage/' . $product->img) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                        <p class="card-text price"><strong>₱{{ $product->price }}</strong></p>
                        <div class="d-flex justify-content-center gap-2">
                            <button style="width: 100%;">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" required class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="img">Image:</label>
                            <input type="file" name="img" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" name="price" required class="form-control">
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary d-flex mx-auto">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .edit, .delete{
            width: 60px;
            color: #fff;
            font-weight: 700;
            border: 3px solid #fff;
        }
        
        .edit:hover, .delete:hover{
            border: 3px solid #fff;
            color: #fff;
        }

        .card {
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
            border-radius: 15px;
            background-color: #000;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            margin: 10px 5px 20px 5px;
            transition: all 0.3s ease;
            color: #fff;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        h5 {
            font-weight: 700;
            font-size: 1.25rem;
            color: #333;
        }

        p {
            font-weight: 500;
            opacity: 0.8;
            color: #fff;
        }

        .price{
            font-weight: 800;
            color: yellow !important;
            text-align: start !important;
            margin-left: 10px;
            font-size: 24px;
        }

        button {
            border: none;
            background-color: #fff;
            padding: 10px 28px;
            font-size: 18px;
            color: #000;
            border-radius: 10px;
            font-weight: 700;
            transition: background-color 0.3s ease;
        }
    
        button:hover {
            background-color: #000; 
            color: #fff;
            border: 1px solid #fff;
        }

        .add {
            margin-left: 20px;
            border: none;
            background-color: #808080;
            padding: 10px 28px;
            font-size: 18px;
            color: #fff;
            border-radius: 5px;
            font-weight: 700;
            transition: background-color 0.3s ease;
            
        }

        .add:hover {
            background-color: #808080;
            color: #fff;
        }

        img {
            width: 100%;
            height: 250px;
            object-fit: cover; 
            border-radius: 10px;
            margin-top: 5px;
        }
        .modal-content {
            border-radius: 15px;
        }

        .modal-header {
            color: white;
        }

        .modal-footer button {
            border-radius: 25px;
        }

        .card-header{
            width: 35%; 
            margin-left: auto;
        }
    </style>
@endsection
