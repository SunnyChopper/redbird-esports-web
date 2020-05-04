<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
	protected $table = "events";
    public $primaryKey = "id";

    public function game() {
    	return $this->belongsTo('App\Game', 'game_id', 'id');
    }

    public function type() {
        return $this->hasOne('App\EventType', 'id', 'event_type_id');
    }

    public function admin() {
    	return $this->belongsTo('App\EventType', 'event_type_id', 'id');
    }

    public function scopeFuture($query) {
        return $query->whereDate('event_datetime', '>', Carbon::now());
    }

    public function scopeActive($query) {
    	return $query->where('is_active', 1);
    }

    public function scopeDeleted($query) {
    	return $query->where('is_active', 0);
    }

}
