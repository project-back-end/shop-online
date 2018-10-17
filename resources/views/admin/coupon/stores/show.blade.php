@extends('admin.master')

@section('content-title')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.stores') }}">Store</a>
        </li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-img">
                    <center>
                        <img src="{{ asset('images/stores/'.$stores->image ) }}" alt="{{ $stores->name }}">
                    </center>
                </div>
                <div class="card-header">
                    <strong>Store Information</strong>
                </div>
                <div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Name: </strong>
                            <span>
                                {{ $stores->name }}
                            </span>
                        </li>
                        <li class="list-group-item">
                            <strong>Slug: </strong>
                            <span>
                                {{ $stores->slug }}
                            </span>
                        </li>
                        <li class="list-group-item">
                            <strong>Description:</strong>
                            <span>
                                {{ $stores->description }}
                            </span>
                        </li>
                        <li class="list-group-item">
                            <strong>Home URL: </strong>
                            <span>
                                @if($stores->home_url == null)
                                    <span>Does not exist yet</span>
                                @else
                                    <a href="{{ $stores->home_url }}">{{ $stores->home_url }}</a>
                                @endif
                            </span>
                        </li>
                        <li class="list-group-item">
                            <strong>Feature Store: </strong>
                            <span>
                                @if($stores->feature_store == 0)
                                    <i class="far fa-star"></i>
                                @else
                                    <i class="fas fa-star"></i>
                                @endif
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="locat" onclick="getMyID(this.id)">Location</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="addition" onclick="getMyID(this.id)">Additional Information</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div id="location">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Street:</strong>
                                <span>
                                    @if($stores->street == null)
                                        <span>Does not exist yet</span>
                                    @else
                                        {{ $stores->street }}
                                    @endif
                                </span>
                            </li>
                            <li class="list-group-item">
                                <strong>Village:</strong>
                                <span>
                                    @if($stores->village == null)
                                        <span>Does not exist yet</span>
                                    @else
                                        {{ $stores->village }}
                                    @endif
                                </span>
                            </li>
                            <li class="list-group-item">
                                <strong>City:</strong>
                                <span>
                                    @if($stores->city == null)
                                        <span>Does not exist yet</span>
                                    @else
                                        {{ $stores->city }}
                                    @endif
                                </span>
                            </li>
                            <li class="list-group-item">
                                <strong>Capital/Province:</strong>
                                <span>
                                    @if($stores->capital == null)
                                        <span>Does not exist yet</span>
                                    @else
                                        {{ $stores->capital }}
                                    @endif
                                </span>
                            </li>
                            <li class="list-group-item">
                                <strong>Country:</strong>
                                <span>
                                    @if($stores->country == null)
                                        <span>Does not exist yet</span>
                                    @else
                                        {{ $stores->country }}
                                    @endif
                                </span>
                            </li>
                            <li class="list-group-item">
                                <strong>Latitude:</strong>
                                <span>
                                    @if($stores->latitude == null)
                                        <span>Does not exist yet</span>
                                    @else
                                        {{ $stores->latitude }}
                                    @endif
                                </span>
                            </li>
                            <li class="list-group-item">
                                <strong>Longitude:</strong> <span>
                                    @if($stores->longitude == null)
                                        <span>Does not exist yet</span>
                                    @else
                                        {{ $stores->longitude }}
                                    @endif
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div id="add_infor" style="display: none;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Tel:</strong>
                                <span>
                                    @if($stores->telephone == null)
                                        <span>Does not exist yet</span>
                                    @else
                                        {{ $stores->telephone }}
                                    @endif
                                </span>
                            </li>
                            <li class="list-group-item">
                                <strong>Email:</strong>
                                <span>
                                    @if($stores->email == null)
                                        <span>Does not exist yet</span>
                                    @else
                                        {{ $stores->email }}
                                    @endif
                                </span>
                            </li>
                            <li class="list-group-item">
                                <strong>Facebook URL:</strong>
                                <span>
                                    @if($stores->url_facebook == null)
                                        <span>Does not exist yet</span>
                                    @else
                                        <a href="{{ $stores->url_facebook }}">{{ $stores->url_facebook }}</a>
                                    @endif
                                </span>
                            </li>
                            <li class="list-group-item">
                                <strong>Instagram URL:</strong>
                                <span>
                                    @if($stores->url_instagram == null)
                                        <span>Does not exist yet</span>
                                    @else
                                        <a href="{{ $stores->url_instagram }}">{{ $stores->url_instagram }}</a>
                                    @endif
                                </span>
                            </li>
                            <li class="list-group-item">
                                <strong>Linkedin URL:</strong>
                                <span>
                                    @if($stores->url_linked == null)
                                        <span>Does not exist yet</span>
                                    @else
                                        <a href="{{ $stores->url_linked }}">{{ $stores->url_linked }}</a>
                                    @endif
                                </span>
                            </li>
                            <li class="list-group-item">
                                <strong>Website:</strong>
                                <span>
                                    @if($stores->url_website == null)
                                        <span>Does not exist yet</span>
                                    @else
                                        <a href="{{ $stores->url_website }}">{{ $stores->url_website }}</a>
                                    @endif
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <a class="btn btn-sm btn-success" href="{{ route('admin.stores') }}"> Back</a>
            </div>
        </div>
        <div class="col-md-8">
            <table id="example" class="table table-striped table-bordered">
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
                @foreach($stores->product as $product)
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
    <script>
        function getMyID(id){
            console.log(id)
            if(id === 'locat'){
                $("#location").show();
                $("#add_infor").hide();
            }else if(id === 'addition'){
                $("#location").hide();
                $("#add_infor").show();
            }
            else{
                $("#location").show();
            }
        }
    </script>
    <script>
        $(document).ready(function(){
            $('ul li a').click(function(){
                $('li a').removeClass("active");
                $(this).addClass("active");
            });
        });
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
    @endpush