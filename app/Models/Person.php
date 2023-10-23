<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    protected $fillable = ['name', 'quote', 'biograph', 'image', 'date', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
