<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reqfarm extends Model
{
    protected $guarded =['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function status():Attribute
    {
        return new Attribute(
            get: fn ($value) => ["request", "farmer", "break"][$value],
        );
    }
}
