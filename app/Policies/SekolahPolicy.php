<?php

namespace App\Policies;

use App\Models\Sekolah;
use App\Models\User;

class SekolahPolicy
{
    /** Peran yang boleh melihat data semua sekolah. */
    private const PERAN_LINGKUP_KORWIL = ['admin', 'operator_korwil', 'korwilcam'];

    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(self::PERAN_LINGKUP_KORWIL);
    }

    public function view(User $user, Sekolah $sekolah): bool
    {
        if ($user->hasAnyRole(self::PERAN_LINGKUP_KORWIL)) {
            return true;
        }

        if ($user->hasAnyRole(['operator_sekolah', 'kepala_sekolah'])) {
            return $user->sekolahList()->contains('id', $sekolah->id);
        }

        return false;
    }
}
