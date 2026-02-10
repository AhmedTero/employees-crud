@extends("employees-crud/layouts.app")

@section("content")
<div class="container mt-5">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-6">
                <h2>Personal details</h2>
            </div>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h6 class="card-title">Name: {{ $employee->name }}</h6>
    <h6 class="card-title">Email: {{ $employee->email }}</h6>
    <h6 class="card-title">Address: {{ $employee->address }}</h6>
    <h6 class="card-title">Position: {{ $employee->position }}</h6>
    <h6 class="card-title">Salary: {{ $employee->salary }} EGP</h6>
    <h6 class="card-title">Status: {{ $employee->status }}</h6>
    <a href="{{ route("employee.index") }}">Back</a>
    <a href="{{ route("employees.export", $employee->id) }}">Export pdf</a>
  </div>
    </div>
</div>
@endsection