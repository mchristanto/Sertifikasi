<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    // Show the view riwayat peminjaman
    public function create() {
        $history = History::with(['member', 'book'])->orderby('tgl_pinjam')->get();
        return view('lending.history', ['history' => $history]);
    }
    
    

    // Update status_kembali data in database
    public function update(Request $request, History $history)
    {
        $history->update([
            'status' => $request->has('status') ? 'returned' : 'borrowed',
        ]);

        return redirect()->route('history.create')->with('success', 'Status updated successfully.');
    }
}
