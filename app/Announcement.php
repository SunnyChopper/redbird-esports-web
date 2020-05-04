<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    
	protected $table = "announcements";
    public $primaryKey = "id";

    public function game() {
    	return $this->belongsTo('App\Game', 'game_id', 'id');
    }

    public function admin() {
    	return $this->belongsTo('App\User', 'admin_id', 'id');
    }

    public function scopeActive($query) {
    	return $query->where('is_active', 1);
    }

    public function scopeDeleted($query) {
    	return $query->where('is_active', 0);
    }

}
