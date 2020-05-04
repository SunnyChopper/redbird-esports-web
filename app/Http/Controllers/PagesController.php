<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    
	/* ---------------------------- *\
	|  Pages Controller              |
	|--------------------------------|
	|  1. Guest Views                |
	|  2. Admin Views                |
	|  3. Helper Functions           |
	\* ---------------------------- */

	/* --------------------- *\
	|  1. Guest Views         |
	\* --------------------- */

	public function index() {
		return view('guest.index');
	}

	public function register() {
		return view('guest.register');
	}

	/* --------------------- *\
	|  2. Admin Views         |
	\* --------------------- */

	public function login() {
		return view('admin.login');
	}

	/* --------------------- *\
	|  3. Helper Functions    |
	\* --------------------- */

}
