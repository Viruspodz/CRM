<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealRepresentative extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function deals()
    {
        return $this->hasMany(Deal::class, 'deal_representative_id');
    }
}
