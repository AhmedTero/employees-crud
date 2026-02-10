@extends("employees-crud/layouts.app")

@section("content")
    <h1>Employee PDF</h1>
    <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>email</td>
                <td>address</td>
                <td>position</td>
                <td>salary</td>
                <td>status</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($data as $emp)
                    <td>{{ $emp->id }}</td>
                    <td>{{ $emp->name }}</td>
                    <td>{{ $emp->email }}</td>
                    <td>{{ $emp->address }}</td>
                    <td>{{ $emp->position }}</td>
                    <td>{{ $emp->salary }}</td>
                    <td>{{ $emp->status }}</td>
                @endforeach
            </tr>
        </tbody>
    </table> 
@endsection