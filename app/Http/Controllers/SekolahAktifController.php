<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SekolahAktifController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'sekolah_id' => ['required', 'integer'],
        ]);

        $bolehDipilih = $request->user()->sekolahList()->pluck('id');

        if (! $bolehDipilih->contains((int) $data['sekolah_id'])) {
            abort(403);
        }

        session(['sekolah_aktif_id' => (int) $data['sekolah_id']]);

        return back()->with('status', 'Sekolah aktif diganti.');
    }
}
