<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\View\View;

class SekolahController extends Controller
{
    public function index(): View
    {
        $this->authorize('viewAny', Sekolah::class);

        $sekolah = Sekolah::orderBy('nama')->get();

        return view('sekolah.index', compact('sekolah'));
    }

    public function show(Sekolah $sekolah): View
    {
        $this->authorize('view', $sekolah);

        return view('sekolah.show', compact('sekolah'));
    }
}
