@extends('admin.master')
@section('content-title')
    <!-- Breadcrumbs-->
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.users') }}">Users-Management</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
        <li style="margin-left: auto">
            @can('user-create')
            <a class="breadcrumb-btn btn btn-success" href="{{ route('admin.users.create') }}"> Create User</a>
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
                <th>Email</th>
                <th>Roles</th>
                <th>Posts</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>{!! $user->product->count() !!}</td>
                <td>
                    {{ $user->created_at }}
                </td>
                <td>
                    <a class="btn btn-sm btn-success" href="{{ route('admin.users.view',$user->id) }}">Show</a>
                    @can('user-edit')
                        <a class="btn btn-sm btn-info" href="{{ route('admin.users.edit',$user->id) }}">Edit</a>
                    @endcan
                    @can('user-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['admin.users.destroy', $user->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger','onclick' => 'return alert()']) !!}
                        {!! Form::close() !!}
                        @endcan
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
    </script>
    <script>
        function alert() {
            if(confirm('Are you sure you want to delete this user?')){
                return true;
            }else {
                return false;
            }
        }
    </script>
@endpush
{{--@push('scripts')--}}
    {{--<script>--}}
        {{--$(function() {--}}
            {{--$('#users-table').DataTable({--}}
                {{--processing: true,--}}
                {{--serverSide: true,--}}
                {{--deferRender: true,--}}
                {{--ajax: '{!! route('admin.users.getUser') !!}',--}}
                {{--columns: [--}}
                    {{--{ data: 'name', name: 'name'},--}}
                    {{--{ data: 'email', name: 'email'},--}}
                    {{--{ data: 'roles', name: 'roles'},--}}
                    {{--{ data: 'action', name: 'action', orderable: false, searchable: false}--}}
                {{--]--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
{{--@endpush--}}