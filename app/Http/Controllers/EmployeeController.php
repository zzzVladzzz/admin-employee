<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\StoreEmployee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::table('employee')->paginate(15);

        return view('employee/index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $managers = User::role('manager')->get()->toArray();

        return view('employee/create', ['managers' => $managers]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {
        $employee = Employee::create($request->all());

        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::where('id', '=', $id)->firstOrFail();
        $managers = User::role('manager')->get()->toArray();

        return view('employee/update', ['employee' => $employee, 'managers' => $managers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployee $request, $id)
    {
        $employee = Employee::where('id', '=', $id)->firstOrFail();
        $employee->name = $request->get('name');
        $employee->phone = $request->get('phone');
        $employee->email = $request->get('email');
        $employee->address = $request->get('address');
        $employee->manager_id = $request->get('manager_id');
        $employee->contract_expiration_date = $request->get('contract_expiration_date');
        if (is_file($request->file_contract))
            $employee->file_contract = $request->file_contract;
        $employee->saveOrFail();

        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::where('id', '=', $id)->firstOrFail();

        $employee->delete();

        return redirect()->route('employee.index');
    }
}
