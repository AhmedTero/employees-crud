<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EmployeeController extends Controller
{
    // Index employees
    public function index(Request $request)
    {
        $search = $request->get('search');

        $employees = Employee::when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('position', 'like', "%{$search}%");
            })
            ->paginate(5);

            // AJAX request → return partial view
            if ($request->ajax()) {
                return view('employees-crud/includes.table', compact('employees'))->render();
            }
            return view('employees-crud/pages.index', compact('employees'));
        }
        
        // Show employee
        public function show($employee){
            $employee = Employee::findOrFail($employee); 
            return view('employees-crud/pages.show', ["employee"=>$employee]);
        }

    // Create 
    public function create(){
        return view("employees-crud.pages.create");
    }
    // Store into database
    public function store(Request $request){
        //* Validation
        $validated = $request->validate([
            "name"=>"required|string|max:100",
            "email"=>"required|email|max:100",
            "address"=>"nullable|string|max:100",
            "phone"=>"nullable|numeric",
            "position"=>"required|string",
            "status"=>"required|string",
            "salary"=>"required|numeric|between:1000,90000",
        ]);

        //* Check if there errors 
        if(!$validated){
            //! Errors
            return redirect()->back()->withErrors($validated, "errors");
        } 
            //* Store into database
            Employee::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "address"=>$request->address,
                "phone"=>$request->phone,
                "position"=>$request->position,
                "status"=>$request->status,
                "salary"=>$request->salary,
            ]);
            //* Redirect and show msg
            return redirect()->back()->with("success", "employee was save successfully");
    }
    
    // Edit page
    public function edit($edit){
        // Find employee 
        $employee = Employee::findOrFail($edit);
        if($employee){
            return view("employees-crud.pages.edit", ["employee"=>$employee]);
        }
    }
    // Update
    public function update(Employee $employee,Request $request, $id){
        $emp = $employee->findOrFail($id);
        // Validation
         $validated = $request->validate([
            "name"=>"required|string|max:100",
            "email"=>"required|email|max:100",
            "address"=>"nullable|string|max:100",
            "phone"=>"nullable|numeric",
            "position"=>"required|string",
            "status"=>"required|string",
            "salary"=>"required|numeric|between:1000,90000",
        ]);
         if(!$validated){
            //! Errors
            return redirect()->back()->withErrors($validated, "errors");
        } 
        $emp->update($validated);
        return redirect()->back()->with("success", "Updated successfully");
        }
        
        // Destroy
    public function delete(Employee $employee, $id){
        $emp = $employee->findOrFail($id);
        if($emp){
            $emp->delete();
            return redirect()->back()->with("success", "Deleted successfully");
        }
    }

     public function bulkDelete(Employee $employee, Request $request){
       $request->validate([
        "ids" => "required|array",
        "ids.*" => "integer",
       ]);
       $employee->whereIn("id", $request->ids)->delete();
       return response()->json([
            "msg"=>"deleted",
       ], 200);
    }

    public function exportPdf(Request $request, $id)
    {
        $emp = Employee::findOrFail($id);

        $data = [
            "employees" => $emp,
        ];

        $pdf = Pdf::loadView('employees-crud/pages.pdf', compact('data'));
        return $pdf->download('employees.pdf');
    }
}
