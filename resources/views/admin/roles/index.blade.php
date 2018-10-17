@extends('admin.master')

@section('content-title')
    <!-- Breadcrumbs-->
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.roles') }}">Roles-Management</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
        <li style="margin-left: auto">
            @can('role-create')
                <a class="breadcrumb-btn btn btn-success" href="{{ route('admin.roles.create') }}"> Create Role</a>
            @endcan
        </li>
    </ul>
@endsection

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <span>{{ $message }}</span>
    </div>
@endif

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Guard Name</th>
        <th>Created At</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($roles as $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td>{{ $role->guard_name }}</td>
            <td>{{ $role->created_at }}</td>
            <td>
                <div class="action">
                    <a class="btn btn-sm btn-success" href="{{ route('admin.roles.show',$role->id) }}">Show</a>
                    @can('role-edit')
                        <a class="btn btn-sm btn-info" href="{{ route('admin.roles.edit',$role->id) }}">Edit</a>
                    @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['admin.roles.destroy', $role->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger','onclick' => 'return alert()']) !!}
                        {!! Form::close() !!}
                    @endcan
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                "columnDefs": [
                    {
                        "orderable": false, "targets": 3
                    }
                ]
            });
        } );
        function alert() {
            if (confirm('Are you sure you want to delete this roles?')){
                return true;
            }
            else {
                return false;
            }
        }
    </script>
    @endpush