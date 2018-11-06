<?php


namespace App\Http\Controllers;


use App\Product;
use App\Categories;
use App\Store;
use Carbon\Carbon;
use Image;
use File;
use Auth;
use DB;
use Illuminate\Http\Request;


class ProductController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:product-list');
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_date = Carbon::today()->toDateString();
        $products = Product::all();

        $products_no_expires = Product::where('end_date' , null)->get();

        $products_has_expires= DB::table('products')->where([
            ['start_date', '<=', $current_date],
            ['end_date', '>=', $current_date]
        ])->get();

        $products_expires = DB::table('products')->where('end_date', '<' ,$current_date)->get();

        $products_start = Product::where([
            ['start_date', '<=', $current_date],
            ['end_date', '>=', $current_date]
        ])
            ->orwhere([
                ['start_date', '<=', $current_date],
                ['end_date', '=' , null]
            ])
            ->get();
//        dd($products_expires, $products_no_expires , $products_has_expires, $products_start);
        return view('admin.coupon.index',compact('products','products_no_expires' , 'products_expires', 'products_start'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $st = Store::pluck('name','id');
        $cat = Categories::pluck('name','id');
        $stores = ['' => 'Select Stores'] + $st->all();
        $categories = ['' => 'Select Category'] + $cat->all();

//        dd($stores,$categories);
        return view('admin.coupon.create', compact('stores','categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $date=Carbon::now()->format('Y-m-d');
//        dd($date);
        $product = $request->all();
        if ($request->get('type') == 'deal'){

            if ($request->get('end_date') == null){
                $product['end_date'] =  null;

                if ($request->get('start_date') == null){
                    $this->validate($request,[
                        'name' => 'required',
                        'description' => 'required',
                        'url' => 'required|url'
                    ]);
                    $product['start_date'] = Carbon::now()->toDateString();
                }else{
                    $product['start_date'] = $request->get('start_date');
                    $this->validate($request,[
                        'name' => 'required',
                        'description' => 'required',
                        'start_date'=> 'date|after_or_equal:today',
                        'url' => 'required|url',
                    ]);
                }

            }else{
                $this->validate($request,[
                    'name' => 'required',
                    'description' => 'required',
                    'end_date'=> 'date|after_or_equal:today',
                    'url' => 'required|url',
                ]);
                $product['end_date'] = $request->get('end_date');
                if ($request->get('start_date') == null){
                    $product['start_date'] = Carbon::now()->format('Y-m-d');
                }
                else{
                    $product['start_date'] = $request->get('start_date');
                    $this->validate($request,[
                        'name' => 'required',
                        'description' => 'required',
                        'start_date'=> 'date|before_or_equal:end_date|after_or_equal:today',
                        'url' => 'required|url',
                    ]);
                }
            }
        }
        elseif ($request->get('type') == 'printable'){
            if ($request->get('end_date') == null){
                $product['end_date'] =  null;

                if ($request->get('start_date') == null){
                    $this->validate($request,[
                        'name' => 'required',
                        'description' => 'required',
                        'printable' => 'required'
                    ]);
                    $product['start_date'] = Carbon::now()->toDateString();
                }
                else{
                    $product['start_date'] = $request->get('start_date');
                    $this->validate($request,[
                        'name' => 'required',
                        'description' => 'required',
                        'start_date'=> 'date|after_or_equal:today',
                        'printable' => 'required',
                    ]);
                }
            }
            else{
                $this->validate($request,[
                    'name' => 'required',
                    'description' => 'required',
                    'end_date'=> 'date_format:"d-m-Y"|after_or_equal:today',
                    'printable' => 'required',
                ]);
                $product['end_date'] = $request->get('end_date');
                if ($request->get('start_date') == null){
                    $product['start_date'] = Carbon::now()->toDateString();
                }else{
                    $product['start_date'] = $request->get('start_date');
                    $this->validate($request,[
                        'name' => 'required',
                        'description' => 'required',
                        'start_date'=> 'date_format:"d-m-Y"|before_or_equal:end_date|after_or_equal:today',
                        'printable' => 'required',
                    ]);
                }
            }
            if ($request->file('printable')){
                $printable = $request->file('printable');
                $name = time().'-'.str_slug($product['name'],"-").'.'.$printable->GetClientOriginalExtension();
                $printable_path = public_path('images/printable/'.$name);
                $printableUpload = Image::make($printable->getRealPath())->save($printable_path);
                $product['printable']= $name;
            }
        }
        elseif ($request->get('type') == 'code'){
            if ($request->get('end_date') == null){
                $product['end_date'] = null;

                if ($request->get('start_date') == null){
                    $this->validate($request,[
                        'name' => 'required',
                        'description' => 'required',
                        'code' => 'required'
                    ]);
                    $product['start_date'] = Carbon::now()->toDateString();
                }
                else{
                    $product['start_date'] = $request->get('start_date');
                    $this->validate($request,[
                        'name' => 'required',
                        'description' => 'required',
                        'start_date'=> 'date|after_or_equal:today',
                        'code' => 'required',
                    ]);
                }

            }
            else{
                $this->validate($request,[
                    'name' => 'required',
                    'description' => 'required',
                    'end_date'=> 'date|after_or_equal:today',
                    'code' => 'required',
                ]);
                $product['end_date'] = $request->get('end_date');
                if ($request->get('start_date') == null){
                    $product['start_date'] = Carbon::now()->toDateString();
                }else{
                    $product['start_date'] = $request->get('start_date');
                    $this->validate($request,[
                        'name' => 'required',
                        'description' => 'required',
                        'start_date'=> 'date|before_or_equal:end_date|after_or_equal:today',
                        'code' => 'required',
                    ]);
                }
            }
        }

        if ($request->get('feature_store') == null){
            $product['feature_store'] = '0';
        }
        else{
            $product['feature_store'] =  $request->get('feature_store');
        }
        if ($request->get('slug')== null){
            $product['slug'] = str_slug($request->get('name'),'-');
        }
        else{
            $product['slug']= $request->get('slug');
        }

        $product['user_id'] = Auth::id();
        Product::create($product);
        return redirect()->route('admin.products')
                        ->with('success','Product created successfully.');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        return view('admin.coupon.show',compact('products'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return view('admin.coupon.edit');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);


        $product->update($request->all());


        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();
        return redirect()->route('admin.products')
                        ->with('success','Product deleted successfully');
    }
}