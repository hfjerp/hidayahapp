<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HfIoaDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function familyMember()
    {
        return $this->belongsTo(HfFamilyMember::class);
    }
}
