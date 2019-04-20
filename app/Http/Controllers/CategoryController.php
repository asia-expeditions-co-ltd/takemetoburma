<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $getCat = Category::where(['web'=>1, 'status'=> 1])->orderBy('id', 'DESC')->get();
        if (isset($req->eid)) {
            $catEdit = Category::find($req->eid);
        }
        return view('admin.category.category', compact('getCat', 'catEdit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return $req->
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {

        if($req->eid != ''){
            $addcat = Category::find($req->eid);
            $addcat->name = $req->name;
            $addcat->web = 1;
            $addcat->meta_keyword = $req->keyword;
            $addcat->save();
            $message = 'Category has been update !';
        }else{
            if(!Category::checkName($req->name)){
                $editcat = new Category;
                $editcat->name = $req->name;
                $editcat->web = 1;
                $editcat->meta_keyword = $req->keyword;
                $editcat->save();
                $message = 'Category has been Added !';
            }else{
                $message = 'Category name already exits !';
            }
        }
        return back()->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
