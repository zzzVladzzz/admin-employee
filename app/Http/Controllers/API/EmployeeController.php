<?php

namespace App\Http\Controllers\API;

use App\Employee;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{

    public function employees()
    {
        $employees = Employee::all()->toArray();

        foreach ($employees as &$employee) {
            $employee['file_contract'] = Storage::url($employee['file_contract']);
        }

        return response()->json(['status' => 201, 'data' => [$employees]]);
    }

    public function managers()
    {

        $managers = User::role('manager')->get();

        return response()->json(['status' => 201, 'data' => [$managers]]);
    }

    public function manager(User $user)
    {

        $employees = Employee::where('manager_id', '=', $user->id)->get();

        foreach ($employees as &$employee) {
            $employee['file_contract'] = Storage::url($employee['file_contract']);
        }

        return response()->json(['status' => 201, 'data' => [$employees]]);
    }
}
