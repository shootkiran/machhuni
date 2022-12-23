<?php

namespace App\Models;

use App\Traits\Geographical;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Faker\Generator as Faker;
// use Malhal\Geographical;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Geographical;
    protected static $kilometers = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'latitude',
        'longitude'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function Works()
    {
        return $this->belongsToMany(Work::class);
    }
    public function ReviewsByMe()
    {
        return $this->hasMany(Review::class, 'reviewer');
    }
    public function ReviewsOfMe()
    {
        return $this->hasMany(Review::class, 'user_id');
    }
    public static function seed()
    {
        WorkCategory::factory()->count(100)->create();
        User::factory()->count(500)->hasWorks(1)->create();
    }
}
