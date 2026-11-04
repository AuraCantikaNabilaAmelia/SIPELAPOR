<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

#[Fillable(['name', 'email', 'password', 'sekolah_id'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function sekolah(): BelongsTo
    {
        return $this->belongsTo(Sekolah::class);
    }

    public function sekolahTerkait(): BelongsToMany
    {
        return $this->belongsToMany(Sekolah::class, 'user_sekolah')
            ->withPivot('is_plt')
            ->withTimestamps();
    }

    /**
     * Daftar sekolah yang boleh diakses user ini (lewat pivot user_sekolah,
     * dengan fallback ke sekolah_id untuk operator_sekolah / KS non-Plt).
     *
     * @return Collection<int, Sekolah>
     */
    public function sekolahList(): Collection
    {
        $lewatPivot = $this->sekolahTerkait()->get();

        if ($lewatPivot->isNotEmpty()) {
            return $lewatPivot;
        }

        return $this->sekolah ? new Collection([$this->sekolah]) : new Collection();
    }

    public function isPltKepalaSekolah(): bool
    {
        return $this->sekolahTerkait()->wherePivot('is_plt', true)->count() > 1;
    }

    /**
     * Sekolah yang sedang aktif dipilih user (relevan untuk KS Plt).
     * Dibaca dari session, dengan fallback ke sekolah pertama di sekolahList().
     */
    public function sekolahAktif(): ?Sekolah
    {
        $daftar = $this->sekolahList();

        if ($daftar->isEmpty()) {
            return null;
        }

        $idTersimpan = session('sekolah_aktif_id');
        $aktif = $idTersimpan ? $daftar->firstWhere('id', $idTersimpan) : null;

        return $aktif ?? $daftar->first();
    }
}
