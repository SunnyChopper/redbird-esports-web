<?php

namespace App\Http\Controllers;

use Auth;
use App\Game;
use App\Announcement;

use Illuminate\Http\Request;

class AnnouncementsController extends Controller
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

	public function admin_create(Request $data) {
		if (Auth::guest()) {
			return redirect(url('/'));
		} else if (Auth::guest() == false && Auth::user()->is_admin == 0) {
			return redirect(url('/games'));
		}

		$announcement = new Announcement;
		$announcement->game_id = $data->game_id;
		$announcement->title = $data->title;
		$announcement->description = $data->description;
		$announcement->admin_id = Auth::user()->id;
		$announcement->save();

		return redirect()->back();
	}

	public function admin_delete(Request $data) {
		$announcement = Announcement::find($data->announcement_id);
		$announcement->is_active = 0;
		$announcement->save();

		return redirect()->back();
	}

	/* --------------------- *\
	|  2. Get Functions       |
	\* --------------------- */

	public function get() {
		if (isset($_GET['game_id'])) {
			$as = Announcement::where('game_id', $_GET['game_id'])->active()->orderBy('created_at', 'DESC')->get();

			return response()->json([
				'success' => true,
				'announcements' => $as->toArray()
			], 200);
		} else {
			$as = Announcement::active()->get();

			$return_array = array();
			foreach($as as $a) {
				$temp = array();
				$game = Game::find($a->game_id);

				$temp['announcement'] = $a->toArray();
				$temp['game'] = $game->toArray();

				array_push($return_array, $temp);
			}

			return response()->json([
				'success' => true,
				'announcements' => $return_array
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
