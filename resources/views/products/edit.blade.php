@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Editor</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

@section('content')
<main class="container">
    <section class="book-editor-section">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title Bar -->
            <div class="titlebar">
                <h1>Book Editor</h1>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="error-messages">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Card Container -->
            <div class="card-container">
                <div class="card">
                    <!-- Book Title & Author -->
                    <div class="input-group">
                        <label for="title">Title</label>
                        <input id="title" name="title" type="text" value="{{ $product->title }}">
                    </div>

                    <div class="input-group">
                        <label for="author">Author</label>
                        <input id="author" name="author" type="text" value="{{ $product->author }}">
                    </div>

                    <!-- Publication Year -->
                    <div class="input-group">
                        <label for="publication_year">Publication Year</label>
                        <select name="publication_year" id="publication_year">
                            <option value="">Select Year</option>
                            @for ($year = 1900; $year <= 2099; $year++)
                                <option value="{{ $year }}" {{ $year == $product->publication_year ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="card">
                    <!-- Description -->
                    <div class="input-group">
                        <label for="description">Description (optional)</label>
                        <textarea id="description" name="description" cols="10" rows="5">{{ $product->description }}</textarea>
                    </div>

                    <!-- Image Upload -->
                    <div class="input-group">
                        <label for="picture">Image</label>
                        <img src="{{ asset('images/' . $product->picture) }}" alt="Current Book Image" class="img-product" id="file-preview" />
                        <input type="hidden" name="current_image" value="{{ $product->picture }}">
                        <input id="picture" name="picture" type="file" accept="image/*" onchange="showFile(event)">
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="titlebar">
                <input type="hidden" name="hidden_id" value="{{ $product->id }}">
                <button type="submit" class="btn-save">Save</button>
            </div>
        </form>
    </section>
</main>

{{-- JavaScript function to show the image preview --}}
<script>
    function showFile(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var dataURL = reader.result;
            var output = document.getElementById('file-preview');
            output.src = dataURL;
        }
        reader.readAsDataURL(input.files[0]);
    }
</script>

@endsection
