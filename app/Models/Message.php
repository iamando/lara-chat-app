<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['message'];

    /**
     * Message to User -> belongsTo
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
