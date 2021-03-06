<?php

namespace App\Models;

use Dotenv\Repository\Adapter\GuardedWriter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HfReligion extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function hfamily()
    {
        return $this->belongsTo(HfFamily::class);
    }
    
}
