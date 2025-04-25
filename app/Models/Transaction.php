<?php

namespace App\Models;

use App\Models\User;
use App\Models\Investment;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'investment_id',
        'amount',
        'transaction_type',
        'proof_file_path',
        'payment_method',
        'status',
        'reference',
        'payment_details',
    ];

    protected $casts = [
        'payment_details' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }

    /**
     * Get the formatted transaction amount.
     */
    public function getFormattedAmountAttribute()
    {
        $prefix = in_array($this->transaction_type, ['deposit', 'interest', 'dividend']) ? '+' : '-';
        return $prefix . '$' . number_format($this->amount, 2);
    }
}