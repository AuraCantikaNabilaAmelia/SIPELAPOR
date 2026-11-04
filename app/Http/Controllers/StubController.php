<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Placeholder untuk halaman yang menunya sudah dirancang di rencana.md
 * tapi fiturnya baru dikerjakan di tahap (prompt) berikutnya.
 */
class StubController extends Controller
{
    public function show(Request $request): View
    {
        $judul = $request->route()->defaults['judul'] ?? 'Halaman';

        return view('stub', compact('judul'));
    }
}
