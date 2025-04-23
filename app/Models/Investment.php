<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    protected $fillable = [
        'user_id',
        'plan_id',
        'amount',
        'status',
        'start_date',
        'end_date',
        'current_value',
        'total_returns',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(InvestmentPlan::class, 'plan_id', 'id');
        // return $this->belongsTo(InvestmentPlan::class, 'plan_id', 'plan_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Get the investment's current performance percentage.
     */
    public function getPerformancePercentageAttribute()
    {
        if (!$this->amount || !$this->current_value) {
            return 0;
        }

        return (($this->current_value - $this->amount) / $this->amount) * 100;
    }

}