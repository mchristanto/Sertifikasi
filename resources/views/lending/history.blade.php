@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Loan History</title>
</head>

@section('content')
<main class="container">
    <section>
        <div class="titlebar">
            <h1>Loan History</h1>
        </div>
        <div class="table">
            <table>
                <!-- Table Header -->
                <thead>
                    <tr>
                        <th>Borrower Name</th>
                        <th>Title</th>
                        <th>Date Borrowed</th>
                        <th>Date Returned</th>
                        <th>Status</th>
                    </tr>
                </thead>
                
                <!-- Table Body -->
                <tbody>
                    @if (count($history) > 0)
                        @foreach ($history as $histories)
                            <tr>
                                <!-- Borrower Name Column -->
                                <td>{{ $histories->member ? $histories->member->name : 'Unknown Borrower' }}</td>

                                <!-- Book Title Column -->
                                <td>{{ $histories->book ? $histories->book->title : 'Unknown Title' }}</td>

                                <!-- Borrow Date Column -->
                                <td>{{ $histories->tgl_pinjam }}</td>

                                <!-- Return Date Column -->
                                <td>{{ $histories->tgl_kembali }}</td>

                                <!-- Status Column -->
                                <td>
                                    <form action="{{ route('history.update', ['history' => $histories->id]) }}" method="POST" class="status-form">
                                        @csrf
                                        @method('PATCH')
                                        <div class="status-container">
                                            <input type="checkbox" name="status" {{ $histories->status == 'returned' ? 'checked' : '' }} class="status-checkbox">
                                            <label>{{ $histories->status }}</label>
                                        </div>
                                        <button type="submit" class="status-btn">Update</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="no-records">
                            <td colspan="5">No loan history available.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection
