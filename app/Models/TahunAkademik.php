<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TahunAkademik extends Model
{
    use HasFactory;
    public function kelas(): HasOne
    {
        return $this->hasOne(TahunAkademik::class);
    }
}
