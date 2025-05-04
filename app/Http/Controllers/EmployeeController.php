<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use App\Models\Skill;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('company', 'skills')->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();
        $skills = Skill::all();
        return view('employees.create', compact('companies', 'skills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'skills' => 'array|exists:skills,id',
        ]);

        $employee = Employee::create($request->only('name', 'company_id'));
        $employee->skills()->sync($request->skills);

        return redirect()->route('employees.index')->with('success', 'Employee created.');
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        $skills = Skill::all();
        $employee->load('skills');
        return view('employees.edit', compact('employee', 'companies', 'skills'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'skills' => 'array|exists:skills,id',
        ]);

        $employee->update($request->only('name', 'company_id'));
        $employee->skills()->sync($request->skills);

        return redirect()->route('employees.index')->with('success', 'Employee updated.');
    }

    public function destroy(Employee $employee)
    {
        $employee->skills()->detach();
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted.');
    }
}
