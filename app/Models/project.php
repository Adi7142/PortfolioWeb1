<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    protected $fillable = [
        'tag_id',
        'title',
        'description',
        'image',
    ];

    public function tag()
    {
        return $this->belongsTo(tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
