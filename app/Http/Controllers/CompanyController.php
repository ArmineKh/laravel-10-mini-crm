<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'website' => 'required|url',
            'address' => 'required',
            'logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            ]);
        $image_path = $request->file('logo')->store('image', 'public');

        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->address = $request->address;
        $company->logo = $image_path;
        $company->save();
        return redirect()->route('companies.index')
            ->with('status','Company has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::find($id);
        return view('companies.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::find($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'website' => 'required|url',
            'address' => 'required',
            'logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            ]);
        $image_path = $request->file('logo')->store('image', 'public');

        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->address = $request->address;
        $company->logo = $image_path;
        $company->save();
        return redirect()->route('companies.index')
            ->with('status','Company Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect()->route('companies.index')
            ->with('status','Company has been deleted successfully');
    }
}
