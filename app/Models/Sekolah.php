<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolah';

    protected $fillable = [
        'npsn',
        'nss',
        'nama',
        'dabin',
        'alamat',
        'kecamatan',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function penggunaTerkait(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_sekolah')
            ->withPivot('is_plt')
            ->withTimestamps();
    }
}
