<?php

namespace App\Models;

use App\Models\Investment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'name',
        'description',
        'minimum_investment',
        'risk_level',
        'focus',
        'target_return_min',
        'target_return_max',
        'active',
    ];

    public function investments()
    {
        return $this->hasMany(Investment::class, 'plan_id', 'id');
        // return $this->hasMany(Investment::class, 'plan_id', 'plan_id');
    }

    /**
     * Get the target return as a formatted string.
     */
    public function getTargetReturnRangeAttribute()
    {
        if ($this->target_return_min && $this->target_return_max) {
            return $this->target_return_min . '% - ' . $this->target_return_max . '%';
        }

        return 'Varies';
    }
}