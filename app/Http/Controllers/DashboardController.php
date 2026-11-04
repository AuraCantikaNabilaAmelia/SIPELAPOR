<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        $peran = $user->getRoleNames()->first();

        $jumlahSekolah = null;
        if ($user->hasAnyRole(['admin', 'operator_korwil', 'korwilcam'])) {
            $jumlahSekolah = Sekolah::count();
        }

        return view('dashboard', [
            'peran' => $peran,
            'jumlahSekolah' => $jumlahSekolah,
        ]);
    }
}
