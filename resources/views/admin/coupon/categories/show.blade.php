@extends('admin.master')

@section('content-title')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.categories') }}">Category</a>
        </li>
        <li class="breadcrumb-item active">View</li>
    </ol>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <strong>Category Information</strong>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Name:</strong>
                        <span>
                            {{ $categories->name }}
                        </span>
                    </li>
                    <li class="list-group-item">
                        <strong>Description:</strong>
                        <span>
                            @if($categories->description == null)
                                <span>Does not exist yet</span>
                            @else
                                {{ $categories->description }}
                            @endif
                        </span>
                    </li>
                    <li class="list-group-item">
                        <strong>Slug:</strong>
                        <span>
                            {{ $categories->slug }}
                        </span>
                    </li>
                </ul>
                <a class="btn btn-success" href="{{ route('admin.categories') }}"> Back</a>
            </div>
        </div>
        <div class="col-md-8">
            <table id="example" class="row-border" style="width:100%">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Coupon</th>
                    <th>Expires</th>
                    <th>Votes/Click</th>
                    <th>Author</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($categories->product as $product)
                        <tr>
                            <td>
                                {!! $product->name !!}
                            </td>
                            <td>
                                {!! $product->type !!}
                            </td>
                            <td>
                                @if($product->end_date == null)
                                    <mark>No Expires</mark>
                                    @else
                                    <p>Expires at <mark>{!! $product->end_date !!}</mark></p>
                                @endif
                            </td>
                            <td>
                                <p>{!! $product->view !!}</p>
                            </td>
                            <td>
                                <p>{!! $product->user->name !!}</p>
                            </td>
                            <td>
                                <p>{!! $product->created_at !!}</p>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
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
    @endpush