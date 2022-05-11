<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Crypto extends Model
{
    use HasFactory;

    protected $fillable = [
      'api_id',
      'symbol',
      'name'
    ];

    public function users()
    {
      return $this->belongsToMany(User::class);
    }
}
