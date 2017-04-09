<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Http\Requests;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *  \Illuminate\Http\Response
     */
     public function VueJsCrud() {

       return view('\VueJsCrud\index');
     }

    public function index()
    {
        $items = Blog::latest()->paginate(5);
        $response = [
          'pagination' => [
            'total'=> $items->total(),
            'per_page'=>$items->perPage(),
            'current_page'=>$items->currentPage(),
            'last_page'=>$items->lastPage(),
            'from'=>$items->firstItem(),
            'to' =>$items->lastItem()
          ],
          'data'=>$items
        ];
        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $this>validate($request,[
      'title'=> 'required',
      'description' =>'required',
    ]);
    $create = Blog::create($reques->all());
    return response()->json($create);
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
        $this->validate($request,[
          'title'=>'required',
          'description' =>'required',
        ]);
        $edit = Blog::find($id)->update($request->all());

        return response()->json($edit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
        return response()->json(['done']);
    }
}
