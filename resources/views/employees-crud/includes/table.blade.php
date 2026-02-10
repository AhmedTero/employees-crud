<table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>Name</th>
                        <th>Email</th>
						<th>Address</th>
						<th>Phone</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                            <tr id="employee_ids{{ $employee->id }}">
								<td>
									<span class="custom-checkbox">
										<input type="checkbox" class="row-checkbox" id="checkbox1" name="ids" value="{{ $employee->id }}">
										<label for="checkbox1"></label>
									</span>
								</td>
                                <a href="{{ url("employees/$employee->id") }}">
								<td>{{ $employee->name }}</td></a>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->address }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->position }}</td>
                                <td>{{ $employee->status }}</td>
                                <td class="d-flex">
                                    <a href="{{ route("employee.show", $employee->id) }}" class="view" data-toggle="modal"><i class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route("employee.edit", $employee->id) }}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
									<form action="{{ route("employee.delete", $employee->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this item?');">
										@csrf
										@method("DELETE")
										<button type="submit" class="btn btn-danger"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
									</form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="12">Not found</td>
                            </tr>
                    @endforelse
                </tbody>
            </table>
			<div class="clearfix" id="pagination-links">
				{{ $employees->links("pagination::bootstrap-5") }}
            </div>