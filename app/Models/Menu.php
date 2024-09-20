<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pages(){
        return $this->hasMany(MenuPage::class, 'menu_id', 'id');
    }
}
