<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    
	protected $table = "games";
    public $primaryKey = "id";

    public function announcements() {
    	return $this->hasMany('App\Announcement', 'id', 'game_id');
    }

    public function events() {
    	return $this->hasMany('App\Event', 'game_id', 'id');
    }

    public function scopeActive($query) {
    	return $query->where('is_active', 1);
    }

    public function scopeDeleted($query) {
    	return $query->where('is_active', 0);
    }

}
