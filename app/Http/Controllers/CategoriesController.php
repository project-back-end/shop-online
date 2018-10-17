<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return view('admin.coupon.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories',
        ]);
        $categories = $request->all();
        if ($request->get('slug')== null){
            $categories['slug'] = str_slug($request->get('name'),'-');
        }
        else{
            $categories['slug']= $request->get('slug');
        }
        $categories['user_id'] = Auth::id();
        Categories::create($categories);
        return redirect()->route('admin.categories')
            ->with('success','Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Categories::find($id);
        return view('admin.coupon.categories.show',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::find($id);
        return view('admin.coupon.categories.edit',compact('categories'));
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
        $this->validate($request, [
            'name' => 'required|unique:categories,name,'.$id,
        ]);
        $input = $request->all();
        if ($request->get('slug')== null){
            $input['slug'] = str_slug($request->get('name'),'-');
        }
        else{
            $input['slug']= $request->get('slug');
        }
        $categories = Categories::find($id);
        $categories->update($input);
        return redirect()->route('admin.categories')
            ->with('success','Category updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categories::find($id)->delete();
        return back()->with('success','Category deleted successfully');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("categories")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Category Deleted successfully."]);
    }
}
