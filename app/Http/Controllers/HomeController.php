<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('timeIsOut');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (\Auth::user()->hasRole('administrator')) {
            $managers = User::role('manager')->paginate(15);

            return view('home-administrator', ['managers' => $managers]);
        }
        $employees = Employee::where('manager_id', '=', \Auth::user()->id)->get();


        return view('home-manager', ['user' => \Auth::user(), 'employees' => $employees]);
    }

    public function detailViewManager(User $user)
    {
        if (!\Auth::user()->hasRole('administrator')) {
            abort(403);
        }
        $employees = Employee::where('manager_id', '=', $user->id)->get();

        return view('detail-view-manager', ['user' => $user, 'employees' => $employees]);

    }

    public function main()
    {
        return view('welcome');
    }

}
