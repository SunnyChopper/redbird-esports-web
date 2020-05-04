<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Game;
use App\Event;
use App\Announcement;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
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

	public function create(Request $data) {
		if (User::where('email', $data->email)->active()->count() > 0) {
			return response()->json([
				'success' => false,
				'error' => 'Email already associated to an account.'
			], 200);
		} else {
			$user = new User;
			$user->name = $data->name;
			$user->email = $data->email;
			$user->password = Hash::make($data->password);
			$user->save();

			return response()->json([
				'success' => true,
				'user' => $user->toArray()
			], 200);
		}
	}

	/* --------------------- *\
	|  2. Get Functions       |
	\* --------------------- */

	/* --------------------- *\
	|  3. View Functions      |
	\* --------------------- */

	public function login() {
		if (Auth::guest() == false) {
			return redirect(url('/users/dashboard'));
		}

		return view('guest.login');
	}

	public function dashboard() {
		if (Auth::guest() == true) {
			return redirect(url('/login'));
		}

		$announcements = Announcement::active()->take(3)->get();
		$games = Game::active()->get();
		$events = Event::active()->take(3)->get();

		return view('member.dashboard')->with('announcements', $announcements)->with('games', $games)->with('events', $events);
	}

	public function announcements() {
		if (Auth::guest() == true) {
			return redirect(url('/login'));
		}

		$announcements = Announcement::active()->get();

		return view('member.announcements')->with('announcements', $announcements);
	}

	public function games() {
		if (Auth::guest() == true) {
			return redirect(url('/login'));
		}

		$games = Game::active()->get();

		return view('member.games')->with('games', $games);
	}

	public function events() {
		if (Auth::guest() == true) {
			return redirect(url('/login'));
		}

		$events = Event::active()->get();

		return view('member.events')->with('events', $events);
	}

	/* --------------------- *\
	|  4. Helper Functions    |
	\* --------------------- */

	public function logout() {
		Auth::logout();

		return redirect(url('/'));
	}

	public function api_login(Request $data) {
		if (User::where('email', $data->email)->active()->count() > 0) {
			$user = User::where('email', $data->email)->first();
			if (Hash::check($data->password, $user->password)) {
				return response()->json([
					'success' => true,
					'user' => $user->toArray()
				], 200);
			} else {
				return response()->json([
					'success' => false,
					'error' => 'Password is incorrect.'
				], 200);
			}
		} else {
			return response()->json([
				'success' => false,
				'error' => 'No account found with that email.'
			], 200);
		}
	}

	public function login_user(Request $data) {
		if (User::where('email', $data->email)->active()->count() > 0) {
			$user = User::where('email', $data->email)->first();
			if (Hash::check($data->password, $user->password)) {
				Auth::login($user);

				return redirect(url('/users/dashboard'));
			} else {
				return redirect()->back()->with('error', 'Password is incorrect.');
			}
		} else {
			return redirect()->back()->with('error', 'Account not found.');
		}
	}

	public function register(Request $data) {
		if (User::where('email', $data->email)->active()->count() == 0) {
			$email = $data->email;
			$tmp = explode('@', $email);
			$domain = array_pop($tmp);
			if ($domain == 'ilstu.edu') {
				$user = new User;
				$user->name = $data->first_name . " " . $data->last_name;
				$user->email = $data->email;
				$user->password = Hash::make($data->password);
				$user->save();

				Auth::login($user);

				return redirect(url('/users/dashboard'));
			} else {
				return redirect()->back()->with('error', 'We only accept @ilstu.edu email addresses.');
			}
		} else {
			return redirect()->back()->with('error', 'Email already belongs to an account.');
		}
	}

}
