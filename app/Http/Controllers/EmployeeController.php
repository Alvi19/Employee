<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $employees = Employee::all();

        if ($request->expectsJson()) {
            return response()->json([
                'status' => true,
                'message' => 'List of Employees',
                'data' => $employees
            ], 200);
        }

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nik' => 'required',
            'name' => 'required',
            'position' => 'required',
            'department' => 'required',
            'date_of_hire' => 'required|date',
        ]);

        try {
            $employee = Employee::create($data);

            if ($request->expectsJson()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Successfully added employee',
                    'data' => $employee
                ], 201);
            }

            return redirect()->route('employees.index')->with('success', 'Successfully added employee');
        } catch (\Throwable $th) {
            if ($request->expectsJson()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to add employee'
                ], 500);
            }

            return redirect()->back()->with('error', 'Failed to add employee');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        if (request()->expectsJson()) {
            return response()->json([
                'status' => true,
                'message' => 'Employee details',
                'data' => $employee
            ], 200);
        }

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        if (request()->expectsJson()) {
            return response()->json([
                'status' => true,
                'message' => 'Edit Employee',
                'data' => $employee
            ], 200);
        }

        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'name' => 'string',
            'name' => 'string',
            'position' => 'string',
            'department' => 'string',
            'date_of_hire' => 'date',
        ]);

        try {
            $employee->update($data);

            if ($request->expectsJson()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Successfully updated employee',
                    'data' => $employee
                ], 200);
            }

            return redirect()->route('employees.index')->with('success', 'Successfully updated employee');
        } catch (\Throwable $th) {
            if ($request->expectsJson()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to update employee'
                ], 500);
            }

            return redirect()->back()->with('error', 'Failed to update employee');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();

            if (request()->expectsJson()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Successfully deleted employee'
                ], 200);
            }

            return redirect()->route('employees.index')->with('success', 'Successfully deleted employee');
        } catch (\Throwable $th) {
            if (request()->expectsJson()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to delete employee'
                ], 500);
            }

            return redirect()->back()->with('error', 'Failed to delete employee');
        }
    }
}
