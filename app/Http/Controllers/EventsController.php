<?php

namespace App\Http\Controllers;

use Auth;

use App\Game;
use App\Event;
use App\EventType;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    
	/* ---------------------------- *\
	|  Feature Controller            |
	|--------------------------------|
	|  1. CRUD Functions             |
	|  2. Get Functions              |
	|  3. View Functions             |
	|  4. Helper Functions           |
	\* ---------------------------- */

	/* --------------------- *\
	|  1. CRUD Functions      |
	\* --------------------- */

	public function admin_create_event_type(Request $data) {
		if (Auth::guest()) {
			return redirect(url('/'));
		} else if (Auth::guest() == false && Auth::user()->is_admin == 0) {
			return redirect(url('/events'));
		}

		$type = new EventType;
		$type->type = $data->title;
		$type->save();

		return redirect()->back();
	}

	public function admin_create_event(Request $data) {
		if (Auth::guest()) {
			return redirect(url('/'));
		} else if (Auth::guest() == false && Auth::user()->is_admin == 0) {
			return redirect(url('/events'));
		}

		$event = new Event;
		$event->game_id = $data->game_id;
		$event->title = $data->title;
		$event->location = $data->location;
		$event->event_datetime = $data->event_datetime;
		$event->event_type_id = $data->event_type_id;
		$event->save();

		return redirect()->back();
	}

	public function admin_delete_event(Request $data) {
		if (Auth::guest()) {
			return redirect(url('/'));
		} else if (Auth::guest() == false && Auth::user()->is_admin == 0) {
			return redirect(url('/events'));
		}

		$event = Event::find($data->event_id);
		$event->is_active = 0;
		$event->save();

		return redirect()->back();
	}

	/* --------------------- *\
	|  2. Get Functions       |
	\* --------------------- */

	public function get() {
		if (isset($_GET['game_id'])) {
			$events = Event::where('game_id', $_GET['game_id'])->future()->active()->orderBy('event_datetime')->get();

			$return_array = array();
			foreach($events as $e) {
				$temp = array();
				$type = EventType::find($e->event_type_id);

				$temp['event'] = $e->toArray();
				$temp['type'] = $type->toArray();

				array_push($return_array, $temp);
			}

			return response()->json([
				'success' => true,
				'events' => $return_array
			], 200);
		} else {
			$events = Event::future()->active()->orderBy('event_datetime')->get();

			$return_array = array();
			foreach($events as $e) {
				$temp = array();
				$type = EventType::find($e->event_type_id);
				$game = Game::find($e->game_id);

				$temp['event'] = $e->toArray();
				$temp['type'] = $type->toArray();
				$temp['game'] = $game->toArray();

				array_push($return_array, $temp);
			}

			return response()->json([
				'success' => true,
				'events' => $return_array
			], 200);
		}
	}

	/* --------------------- *\
	|  3. View Functions      |
	\* --------------------- */

	/* --------------------- *\
	|  4. Helper Functions    |
	\* --------------------- */

}
