<?php

// app/Models/Status.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory; // Voeg deze regel toe

    protected $fillable = ['name'];
}
