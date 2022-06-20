<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'icon', 'color'];

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
}
