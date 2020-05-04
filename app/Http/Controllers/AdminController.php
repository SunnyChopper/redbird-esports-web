<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Game;
use App\Event;
use App\EventType;
use App\Announcement;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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

	/* --------------------- *\
	|  2. Get Functions       |
	\* --------------------- */

	/* --------------------- *\
	|  3. View Functions      |
	\* --------------------- */

	public function dashboard() {
		if (Session::has('admin_id')) {
			$users = User::active()->take(5)->get();
			$events = Event::active()->take(3)->get();

			return view('admin.dashboard')->with('users', $users)->with('events', $events);
		} else {
			return redirect(url('/'));
		}
	}

	public function announcements() {
		if (Session::has('admin_id')) {
			$announcements = Announcement::active()->get();
			$games = Game::active()->get();

			return view('admin.announcements')->with('announcements', $announcements)->with('games', $games);
		} else {
			return redirect(url('/'));
		}
	}

	public function games() {
		if (Session::has('admin_id')) {
			$games = Game::active()->get();

			return view('admin.games')->with('games', $games);
		} else {
			return redirect(url('/'));
		}
	}

	public function events() {
		if (Session::has('admin_id')) {
			$events = Event::active()->get();
			$types = EventType::active()->get();
			$games = Game::active()->get();

			return view('admin.events')->with('events', $events)->with('types', $types)->with('games', $games);
		} else {
			return redirect(url('/'));
		}
	}

	/* --------------------- *\
	|  4. Helper Functions    |
	\* --------------------- */

	public function login(Request $data) {
		if (User::where('email', $data->email)->count() > 0) {
			$user = User::where('email', $data->email)->first();
			if (Hash::check($data->password, $user->password)) {
				if ($user->is_admin == 1) {
					Auth::login($user);
					Session::put('logged_in', true);
					Session::put('admin_id', $user->id);
					Session::save();

					return redirect(url('/admin/dashboard'));
				} else {
					Auth::login($user);
					return redirect(url('/users/dashboard'));
				}
			} else {
				return redirect()->back()->with('error', 'Password is incorrect.');
			}
		} else {
			return redirect()->back()->with('error', 'No account associated with that email.');
		}
	}

	public function logout() {
		Session::forget('admin_id');
		Session::forget('logged_in');
		Session::save();

		return redirect(url('/'));
	}

}
