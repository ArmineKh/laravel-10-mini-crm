<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with(['company'])->paginate(10);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email',
            'company' => 'required',
            'phone' => 'required'
            ]);

        $employee = new Employee;
        $employee->name = $request->name;
        $employee->surname =$request->surname;
        $employee->email = $request->email;
        $employee->company_id = $request->company;
        $employee->phone = $request->phone;
        $employee->save();
        return redirect()->route('employees.index')
            ->with('status','Employee has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::with(['company'])->find($id);
        return view('employees.show',compact('employee')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        $companies = Company::all();
        return view('employees.edit', compact('employee'), compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email',
            'company' => 'required',
            'phone' => 'required'
            ]);

        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->surname =$request->surname;
        $employee->email = $request->email;
        $employee->company_id = $request->company;
        $employee->phone = $request->phone;
        $employee->save();
        return redirect()->route('employees.index')
            ->with('status','Employee has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employees.index')
            ->with('status','Employe has been deleted successfully');
    }
}
