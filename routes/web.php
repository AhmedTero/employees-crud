<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

// Index
Route::get('employees', [EmployeeController::class, "index"])->name("employee.index");
// Show details 
Route::get('employees/{id}', [EmployeeController::class, "show"])->name("employee.show");

// Create
Route::get('create', [EmployeeController::class, "create"])->name("employee.create");
// Store
Route::post('create', [EmployeeController::class, "store"])->name("employee.store");

// Edit
Route::get('employees/{edit}/edit', [EmployeeController::class, "edit"])->name("employee.edit");
// Update
Route::put('employees/{id}', [EmployeeController::class, "update"])->name("employee.update");

// Delete
Route::delete('employees/{id}', [EmployeeController::class, "delete"])->name("employee.delete");

Route::delete('bulk-delete', [EmployeeController::class, 'bulkDelete'])->name('employee.bulkDelete');


Route::get('employees/export/pdf/{id}', [EmployeeController::class, 'exportPdf'])
    ->name('employees.export');
