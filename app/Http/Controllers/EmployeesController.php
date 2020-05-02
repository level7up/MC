<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Company;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emps= Employee::paginate(10);
        $companies = Company::all();

        return view('employees.index', compact('companies', 'emps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('employees.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'firstname'=> 'required',
            'lastname'=> 'required',
            'email'=>'required',
            'phone'=>'nullable',
            'company_id'=>'required'
        ]);
        $emp = new Employee;

        $emp->firstname =$request->input('firstname');
        $emp->lastname =$request->input('lastname');
        $emp->firstname =$request->input('firstname');
        $emp->email =$request->input('email');
        $emp->phone =$request->input('phone');
        $emp->company_id =$request->input('company_id');

        $emp->save();

        $msg = 'Success';

        return redirect()->route('employees')->with('success' , $msg);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp = Employee::find($id);
        $companies = Company::all();
        return view('employees.edit', compact('companies', 'emp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'firstname'=> 'required',
            'lastname'=> 'required',
            'email'=>'required',
            'phone'=>'nullable',
            'company_id'=>'required'
        ]);

        $emp = Employee::find($id);

        $emp->firstname =$request->input('firstname');
        $emp->lastname =$request->input('lastname');
        $emp->firstname =$request->input('firstname');
        $emp->email =$request->input('email');
        $emp->phone =$request->input('phone');
        $emp->company_id =$request->input('company_id');

        $emp->save();

        $msg = 'Success';
        return redirect()->route('employees')->with('success' , $msg);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Employee::destroy($id);
        return redirect()->back();

    }
}
