<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'deal_number',
        'deal_name',
        'industry',
        'product_type',
        'contact_name',
        'designation',
        'property_owner_tag',
        'contact_number',
        'email_address',
        'deal_size',
        'potential_income',
        'deal_stage',
        'probability',
        'weighted_forecast',
        'priority',
        'from_date',
        'expected_close_date',
        'next_step',
        'remarks',
        'deal_representative_id',
        'location',
    ];

    public function representative()
    {
        return $this->belongsTo(DealRepresentative::class, 'deal_representative_id');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($deal) {
            $deal->deal_number = self::generateDealNumber();
        });
    }

    public static function generateDealNumber()
    {
        $lastDeal = self::orderBy('id', 'desc')->first();
        $nextNumber = $lastDeal ? ((int)substr($lastDeal->deal_number, 3)) + 1 : 1;
        return 'DN-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }


        public function user()
    {
        return $this->belongsTo(User::class);
    }

}
