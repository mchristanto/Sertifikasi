@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Book</title>
    <style>
        .split-container {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            flex-wrap: wrap; /* Ensure the layout is responsive */
        }
        .container-left, .container-right {
            width: 48%; /* Adjust width as needed */
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
        }

        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        .form-group input[type="file"] {
            padding: 6px 10px;
        }

        .form-group textarea {
            resize: vertical;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .img-product {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 15px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .split-container {
                flex-direction: column;
            }

            .container-left, .container-right {
                width: 100%;
            }
        }
    </style>
</head>

@section('content')
<main class="container mt-4">
    <section>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            {{-- CSRF for security --}}
            @csrf
            <div class="titlebar mb-4 text-center">
                <h1>Add Book</h1>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="split-container">
                <!-- First Container: Book Details -->
                <div class="container-left">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" name="title" type="text" class="form-control" placeholder="Enter book title" required>
                    </div>

                    <div class="form-group">
                        <label for="author">Author</label>
                        <input id="author" name="author" type="text" class="form-control" placeholder="Enter author name" required>
                    </div>

                    <div class="form-group">
                        <label for="publication_year">Publication Year</label>
                        <select name="publication_year" id="publication_year" class="form-control" required>
                            <option value="">Select Year</option>
                            @for ($year = 1900; $year <= 2099; $year++)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <!-- Second Container: Additional Information -->
                <div class="container-right">
                    <div class="form-group">
                        <label for="description">Description (optional)</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Enter a description" cols="10" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="picture">Image</label>
                        <img src="" alt="Image Preview" class="img-product" id="file-preview" />
                        <input name="picture" type="file" accept="image/*" class="form-control" onchange="showFile(event)">
                    </div>

                    <button type="submit" class="btn-primary" >Save</button>
                </div>
            </div>
        </form>
    </section>
</main>

{{-- Image preview functionality --}}
<script>
    function showFile(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function () {
            var dataURL = reader.result;
            var output = document.getElementById('file-preview');
            output.src = dataURL;
        }
        reader.readAsDataURL(input.files[0]);
    }
</script>

@endsection
