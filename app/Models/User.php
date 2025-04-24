<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Investment;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'investment_goal',
        'risk_tolerance',
        'investment_horizon',
        'accredited_investor',
        'annual_income',
        'net_worth',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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
            'accredited_investor' => 'boolean',
        ];
    }

    /**
     * Get the user's total investment amount.
     *
     * @return float
     */
    // public function getTotalInvestedAttribute()
    // {
    //     return $this->investments()->sum('amount');
    // }

    public function getTotalInvestedAttribute()
    {
        return $this->deposit()->sum('amount');
    }

    /**
     * Get all of the user's investments.
     */
    public function deposit()
    {
        return $this->hasMany(Deposit::class);
    }

    /**
     * Get all of the user's investments.
     */
    public function investments()
    {
        return $this->hasMany(Investment::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn (string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }
}