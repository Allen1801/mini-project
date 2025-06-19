<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\EmployeeRecord; // Assuming this is the model for employee records

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $employees = EmployeeRecord::all();
        return view('employee-table', compact('employees'));
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            // 'id' => 'required|integer|unique:employee_records,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:10',
            'date_of_birth' => 'required|date',
            'salary' => 'required|numeric|min:0',
        ]);

        // Assuming Employee is a model that handles employee data
        EmployeeRecord::create($validated);

        return redirect()->back()->with('success', 'Employee added successfully!');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            // 'id' => 'required|integer|exists:employee_records,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:10',
            'date_of_birth' => 'required|date',
            'salary' => 'required|numeric|min:0',
        ]);

        // Assuming Employee is a model that handles employee data
        $employee = EmployeeRecord::findOrFail($request->id);
        $employee->update($validated);

        return redirect()->back()->with('success', 'Employee added successfully!');
    }

    public function delete($id)
    {

        // Assuming Employee is a model that handles employee data
        $employee = EmployeeRecord::findOrFail($id);
        $employee->delete();

        return redirect()->back()->with('success', 'Employee deleted successfully!');
    }

    public function stats()
    {
        $totalMaleEmployees = EmployeeRecord::where('gender', 'male')->count();
        $totalFemaleEmployees = EmployeeRecord::where('gender', 'female')->count();
        $avgAge = EmployeeRecord::selectRaw('AVG(TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE())) as avg_age')->value('avg_age');
        $totalSalaries = EmployeeRecord::sum('salary');

        return view('dashboard', compact('totalMaleEmployees', 'totalFemaleEmployees', 'avgAge', 'totalSalaries'));
    }

}


