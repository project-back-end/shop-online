@extends('admin.master')

@section('content-title')
    <!-- Breadcrumbs-->
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.products') }}">Products</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
        <li style="margin-left: auto">
            {{--@can('role-create')--}}
                <a class="breadcrumb-btn btn btn-success" href="{{ route('admin.products.create') }}"> Create Stores</a>
            {{--@endcan--}}
        </li>
    </ul>
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <span>{{ $message }}</span>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" id="All" onclick="getMyID(this.id)">All ({!! $products->count() !!})</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Expires" onclick="getMyID(this.id)">Expires ({!! $products_expires->count() !!})</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="no_expires" >No Expires ({!! $products_no_expires->count() !!})</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Coupon Store</th>
                    <th>Coupon</th>
                    <th>Expires</th>
                    <th>Votes/Click</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products_start as $key => $product)
                    <tr>
                        <td>
                            {!! $product->name !!}
                        </td>
                        <td>
                            {!! $product->store->name !!}
                        </td>
                        <td>
                            <p style="text-transform: uppercase">{!! $product->type !!}</p>
                        </td>
                        <td>
                            @if( $product->end_date == null)
                                <p>No Expired</p>
                            @else
                                <p>Expires <mark>{!! Carbon\Carbon::parse($product->end_date)->format('d-m-Y') !!}</mark></p>
                            @endif
                        </td>
                        <td>
                            {!! $product->view !!}
                        </td>
                        <td>
                            {!! $product->user->name !!}
                        </td>
                        <td>{!! $product->created_at->format('d-m-Y h:m:s') !!}</td>
                        <td>
                            <a class="btn btn-sm btn-success" href="{{ route('admin.products.show',$product->id) }}">Show</a>
                            <a class="btn btn-sm btn-info" href="{{ route('admin.products.edit',$product->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['admin.products.destroy',$product->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger','onclick' => 'return alert()']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
@push('scripts')
    {{--Active--}}
    <script>
        $(document).ready(function(){
            $('ul li a').click(function(){
                $('li a').removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>
    {{--GetId--}}
    <script type="text/javascript">
        function getMyID(id) {
            console.log(id)
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                "columnDefs": [
                    {
//                        "orderable": false, "targets": 9
                    }
                ]
            });
        } );
    </script>
    <script>
        function alert() {
            if(confirm('Are you sure you want to delete this store?')){
                return true;
            }else {
                return false;
            }
        }
    </script>
@endpush