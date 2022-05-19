<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Http\Request;

class Crypto extends Model
{
    use HasFactory;

    protected $fillable = [
      'api_id',
      'symbol',
      'name'
    ];

    public $timestamps = false;

    public function watchlistedBy (User $user)
    {
      return $this->users->contains('user_id', $user->id);
    }

    public function users()
    {
      return $this->belongsToMany(User::class);
    }

    public function cryptodetails()
    {
      return $this->hasOne(CryptoDetails::class, 'api_id');
    }
}
