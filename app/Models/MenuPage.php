<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPage extends Model
{
    use HasFactory;
    protected $table = 'menus_pages';
    protected $guarded = [];

    public function faculty(){
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
    public function parent(){
        return $this->belongsTo(MenuPage::class, 'parent_id', 'id');
    }
    public function pages(){
        return $this->hasMany(MenuPage::class, 'parent_id', 'id');
    }
}
