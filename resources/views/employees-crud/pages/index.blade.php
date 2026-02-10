@extends("employees-crud/layouts.app")

@section("content")

<div class="container" style="margin-top: 25px !important">
	<input type="search" id="search" placeholder="search by name or position" class="form-control">
		@if (session("success"))
			<div class="alert alert-success">
				{{ session("success") }}
			</div>
		@endif
			
        <div class="table-wrapper">
			<div class="table-title">
				<div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Employees</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="{{ route("employee.create") }}" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
						<a href="#" id="deleteSelected" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
                </div>
            </div>
            <div id="employee-table">
				@include('employees-crud/includes.table')
			</div>
        </div>
    </div>
@endsection