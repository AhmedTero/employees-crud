@extends("employees-crud/layouts.app")

@section("content")
<div class="container">
    @if(session("success"))
        <div class="alert alert-success">
            {{ session("success") }}
        </div>
    @endif
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
<div id="addEmployeeModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="{{ route("employee.store") }}">
                    @csrf
					<div class="modal-header">						
						<h4 class="modal-title">Add Employee</h4>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" value="{{ old("name") }}" class="form-control">
                            @error("name")
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email"  value="{{ old("email") }}" class="form-control">
                            @error("email")
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" name="address">{{ old("address") }}</textarea>
                            @error("address")
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="number" name="phone"  value="{{ old("phone") }}" class="form-control">
                            @error("phone")
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
						</div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <select name="position" class="form-control">
                                <option value="hr"{{ old("position")=="hr"? 'selected':'' }}>HR</option>
                                <option value="account" {{ old("position")=="account"?'selected':'' }}>Account</option>
                                <option value="dev"{{ old("position")=="dev"?"selected":'' }}>Dev</option>
                                <option value="manager"{{ old("position")=="manager"?"selected":'' }}>Manager</option>
                                <option value="sails"{{ old("position")=="sails"?"selected":'' }}>Sails</option>
                            </select>
                        </div>	
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="inactive" {{ old("status")=="inactive"?"selected":"" }}>inactive</option>
                                <option value="active"{{ old("status")=="active"?"selected":"" }}>active</option>
                            </select>
                            @error("status")
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>		
                        <div class="form-group">
							<label>Salary</label>
							<input type="number" name="salary" value="{{ old("salary") }}" class="form-control">
                            @error("salary")
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
						</div>		
					</div>
					<div class="modal-footer mt-2 d-flex gap-2">
                        <a href="{{ route("employee.index") }}" class="btn btn-danger">Back</a>
                        <button type="submit" class="btn btn-success">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
    
@endsection