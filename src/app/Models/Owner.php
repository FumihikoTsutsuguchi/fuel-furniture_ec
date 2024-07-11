<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Shop;
use App\Models\Image;
use App\Notifications\OwnerResetPassword;
use Illuminate\Notifications\Notifiable;

class Owner extends Authenticatable
{
    use HasFactory,SoftDeletes, Notifiable;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
        'password' => 'hashed',
    ];

    public function shop(): HasOne
    {
        return $this->hasOne(Shop::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function sendPasswordResetNotification($token){
        $this->notify(new OwnerResetPassword($token));
    }
}
