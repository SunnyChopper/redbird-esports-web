<?php

namespace App\Http\Controllers;

use Auth;
use App\Game;

use Illuminate\Http\Request;

class GamesController extends Controller
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

		$game = new Game;
		$game->title = $data->title;
		$game->cover_image = $data->cover_image;
		$game->save();

		return redirect()->back();
	}

	public function admin_delete(Request $data) {
		if (Auth::guest()) {
			return redirect(url('/'));
		} else if (Auth::guest() == false && Auth::user()->is_admin == 0) {
			return redirect(url('/games'));
		}

		$game = Game::find($data->game_id);
		$game->is_active = 0;
		$game->save();

		return redirect()->back();
	}

	public function read() {
		if (isset($_GET['game_id'])) {
			return response()->json([
				'success' => true,
				'game' => Game::find($_GET['game_id'])->toArray()
			], 200);
		} else {
			return response()->json([
				'success' => false,
				'error' => 'Please specify a game id.'
			], 200);
		}
	}

	/* --------------------- *\
	|  2. Get Functions       |
	\* --------------------- */

	public function get() {
		return response()->json([
			'success' => true,
			'games' => Game::active()->get()->toArray()
		], 200);
	}

	/* --------------------- *\
	|  3. View Functions      |
	\* --------------------- */

	/* --------------------- *\
	|  4. Helper Functions    |
	\* --------------------- */

}
