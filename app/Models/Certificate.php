<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = ['title', 'issuer', 'issued_at', 'credential_url', 'image', 'description'];
    protected $casts = ['issued_at' => 'date'];
}
