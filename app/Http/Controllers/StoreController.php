<?php

namespace App\Http\Controllers;

use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use App\Store;
use DB;
use Image;
use Auth;
use File;
class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();
        return view('admin.coupon.stores.index',compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('admin.coupon.stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|unique:stores',
            'description' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif',
            'home_url' => 'nullable|url',
            'url_facebook' => 'nullable|url',
            'url_instagram' => 'nullable|url',
            'url_linked' => 'nullable|url',
            'url_website' => 'nullable|url',
            'email' => 'nullable|email',
        ]);
        $stores = $request->all();
        if ($request->file('file')){
            $image = $request->file('file');
            $filename = time().'-'.str_slug($stores['name'],"-").'.'.$image->GetClientOriginalExtension();
            $image_path = public_path('images/'.$filename);
            $image_store_path = public_path('images/stores/'.$filename);
            $imageUpload = Image::make($image->getRealPath())->save($image_path);
            $imageUpload->resize(150, 150, function ($resize){
                $resize->aspectRatio();
            })->save($image_store_path);
            $stores['image'] = $filename;
        }
        if ($request->get('slug')== null){
            $stores['slug'] = str_slug($request->get('name'),'-');
        }
        else{
            $stores['slug']= $request->get('slug');
        }

        if ($request->get('feature_store') == null){
            $stores['feature_store'] = '0';
        }
        else{
            $stores['feature_store'] =  $request->get('feature_store');
        }
        if ($request->get('country') == null){
            $stores['country']= 'Cambodia';
        }
        else{
            $stores['country']= $request->get('country');
        }
        $stores['user_id'] = Auth::id();
        Store::create($stores);
        return redirect()->route('admin.stores')
            ->with('success','Store created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stores = Store::find($id);
        return view('admin.coupon.stores.show',compact('stores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stores = Store::find($id);
        return view('admin.coupon.stores.edit',compact('stores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|unique:stores,name,'.$id,
            'description' => 'required',
            'home_url' => 'nullable|url',
            'url_facebook' => 'nullable|url',
            'url_instagram' => 'nullable|url',
            'url_linked' => 'nullable|url',
            'url_website' => 'nullable|url',
            'email' => 'nullable|email',
        ]);
        $input = $request->all();
        $stores = Store::find($id);
        if ($request->file('image')){
            $image = $request->file('image');
            $filename = time().'-'.str_slug($input['name'],"-").'.'.$image->GetClientOriginalExtension();
            $image_path = public_path('images/'.$filename);
            $image_store_path = public_path('images/stores/'.$filename);
            $imageUpload = Image::make($image->getRealPath())->save($image_path);
            $imageUpload->resize(300, null, function ($resize){
                $resize->aspectRatio();
            })->save($image_store_path);
            $input['image'] = $filename;

            if(File::exists(public_path('images/'.$stores->image))){
                File::delete(public_path('images/'.$stores->image));
            }
            if(File::exists(public_path('images/stores/'.$stores->image))){
                File::delete(public_path('images/stores/'.$stores->image));
            }
        }
        if ($request->get('slug')== null){
            $input['slug'] = str_slug($request->get('name'),'-');
        }else{
            $input['slug']= $request->get('slug');
        }
        if ($request->get('feature_store') == null){
            $input['feature_store'] = '0';
        }else{
            $input['feature_store'] =  $request->get('feature_store');
        }
        if ($request->get('country') == null){
            $input['country']= 'Cambodia';
        }else{
            $input['country']= $request->get('country');
        }
        $stores->update($input);
        return redirect()->route('admin.stores')
            ->with('success','Store update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stores = Store::findOrFail($id);
        $stores->delete();
        return back()->with('success','Store deleted successfully');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("stores")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Category Deleted successfully."]);
    }
}
