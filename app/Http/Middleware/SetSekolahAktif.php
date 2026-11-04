<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Pastikan session('sekolah_aktif_id') selalu valid untuk user yang
 * sekolahnya lebih dari satu (kepala sekolah Plt).
 */
class SetSekolahAktif
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user && $user->hasAnyRole(['operator_sekolah', 'kepala_sekolah'])) {
            $daftarSekolah = $user->sekolahList();
            $idTersimpan = session('sekolah_aktif_id');

            if ($daftarSekolah->isNotEmpty() && ! $daftarSekolah->contains('id', $idTersimpan)) {
                session(['sekolah_aktif_id' => $daftarSekolah->first()->id]);
            }
        }

        return $next($request);
    }
}
