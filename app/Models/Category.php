<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
