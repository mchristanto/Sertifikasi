@extends('layouts.app')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library</title>
</head>
@section('content')
<main class="container">
    <section>
        <div class="titlebar">
            <h1>Library Catalog</h1>
            <div class="btn-container">
                <a href="{{ route('products.create') }}" class="btn-link">Add Book</a>
                <a href="{{ route('history.create')}}" class="btn-link">Loan History</a>
                <a href="{{ route('lending.create')}}" class="btn-link">Loan</a>
            </div>
        </div>
        
        {{-- FOR THE SEARCH BAR --}}
        <form action="{{ route('products.index') }}" method="GET" accept-charset="UTF-8" role="search">
            @csrf
            <div class="searchbar">
                <input name="search" type="text" placeholder="Search by Name, Author, Year, Publisher..." value="{{ request('search') }}">
            </div>
            
        </form>
        
        
        <div class="table">
            <table>
                <!-- Table Header -->
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <!-- Table Body -->
                <tbody>
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <tr>
                                <!-- Product Image -->
                                <td><img src="{{asset('picture/' . $product->picture)}}" alt="Book Cover" style="width: 80px; height: 120px; object-fit: cover;"></td>

                                <!-- Product Title -->
                                <td>{{ $product->title }}</td>

                                <!-- Product Author -->
                                <td>{{ $product->author }}</td>

                                <!-- Product Year -->
                                <td>{{ $product->publication_year }}</td>

                                <!-- Action Buttons -->
                                <td>
                                    <div class="button-group">
                                        <!-- Edit Button -->
                                        <a href="{{route('products.edit', $product->id)}}" class="btn btn-success">
                                            Edit
                                        </a>
                                        
                                        <!-- Delete Button -->
                                        <form action="{{route('products.destroy', $product->id)}}" method="POST" style="display:inline-block;">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger" onclick="deleteConfirm(event)">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">Book Unavailable</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="table-paginate">
            {{$products->links('layouts.pagination')}}
        </div>
    </section>
</main> 

{{-- FOR THE ALERT OF DELETE THE BOOK --}}
<script>
    window.deleteConfirm = function(e) {
        e.preventDefault();
        var form = e.target.form;
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>
@endsection
