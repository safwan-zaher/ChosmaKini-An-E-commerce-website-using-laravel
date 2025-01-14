<?php

namespace App\Http\Controllers;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $colors = explode(',',$request->color);
        $color = new Color();
        $color->color = json_encode($colors);
        $color->save();
        return redirect()->back()->with('message','Color Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function change_status(Color $color)
    {
        if($color->status==1)
        {
            $color->update(['status'=>0]);

        }else
        {
            $color->update(['status'=>1]);
        }
        return redirect()->back()->with('message','Satus Changed Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('admin.color.edit',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        $colors = explode(',',$request->color);
        $update = $color->update([
            'color' => json_encode($colors),
         

        ]);
        if($update)
        {
            return redirect('/colors')->with('message','Color Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $delete = $color->delete();
        if($delete)
        {
            return redirect()->back()->with('message', 'Color Deleted Successfully');
        }
    }
}
