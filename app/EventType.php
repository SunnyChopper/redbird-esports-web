<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    
	protected $table = "event_types";
    public $primaryKey = "id";

    public function events() {
    	return $this->hasMany('App\Event', 'id', 'event_type_id');
    }

    public function scopeActive($query) {
    	return $query->where('is_active', 1);
    }

    public function scopeDeleted($query) {
    	return $query->where('is_active', 0);
    }

}
