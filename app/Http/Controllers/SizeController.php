<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Size::all();
        return view('admin.size.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sizes = explode(',',$request->size);
        $size = new Size();
        $size->size = json_encode($sizes);
        $size->save();
        return redirect()->back()->with('message','Size Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function change_status(Size $size)
    {
        if($size->status==1)
        {
            $size->update(['status'=>0]);

        }else
        {
            $size->update(['status'=>1]);
        }
        return redirect()->back()->with('message','Satus Changed Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('admin.size.edit',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        $sizes = explode(',',$request->size);
        $update = $size->update([
            'size' => json_encode($sizes),
         

        ]);
        if($update)
        {
            return redirect('/sizes')->with('message','Size Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $delete = $size->delete();
        if($delete)
        {
            return redirect()->back()->with('message', 'Size Deleted Successfully');
        }
    }
}
