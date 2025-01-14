<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('admin.product.create',compact('categories','subcategories','brands','units','sizes','colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $product=new Product();
        $product->cat_id= $request->category;
        $product->subcat_id= $request->subcategory;
        $product->br_id= $request->brand;
        $product->unit_id= $request->unit;
        $product->size_id= $request->size;
        $product->color_id= $request->color;
        $product->code= $request->code;
        $product->name= $request->name;
        $product->description= $request->description;
        $product->price= $request->price;

        $images=array();
        if($files=$request->file('file')){
            $i=0;
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $fileNameExtract=explode('.',$name);
                $fileName=$fileNameExtract[0];
                $fileName.=time();
                $fileName.=$i;
                $fileName.='.';
                $fileName.=$fileNameExtract[1];

                $file->move('image',$fileName);
                $images[]=$fileName;
                $i++;
            }
            $product['image'] = implode("|",$images);

            $product->save();
            return redirect()->back()->with('message', 'New Products added Succesfully!');
        }
        else{
            echo "error";
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function change_status(Product $product)
     {
         if($product->status==1)
         {
             $product->update(['status'=>0]);
 
         }else
         {
             $product->update(['status'=>1]);
         }
         return redirect()->back()->with('message','Satus Changed Successfully');
     }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('admin.product.edit',compact('product','categories','subcategories','brands','units','sizes','colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $size = explode(',',$request->size);
        $color = explode(',',$request->color);
        $validatedData = $request->validate([
            'brand' => 'required|integer|exists:brands,id',
            'file.*' => 'image|mimes:jpeg,png,jpg,gif' // Validate image files
        ]);
        $update = $product->update([
            'code' => $request->code,
            'name' => $request->name,
            'cat_id' => $request->category,
            'subcat_id' => $request->subcategory,
            'br_id' => $request->brand,
            'unit_id' => $request->unit,
            'size_id' => (int)Json_encode($size),
            'color_id' => (int)Json_encode($color),
            'cat_id' => $request->category,
            'description' => $request->description,
            'price'=>$request->price,

            

        ]);
        
        if ($files = $request->file('file')) {
            $images = [];
            $i = 0;
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $fileNameExtract = explode('.', $name);
                $fileName = $fileNameExtract[0] . time() . $i . '.' . $fileNameExtract[1];
                $file->move('image', $fileName);
                $images[] = $fileName;
                $i++;
            }
            $product->image = implode("|", $images);
        }

        if($update)
        {
            return redirect('/products')->with('message','Product Updated Successfully');
        }
    }



 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $delete = $product->delete();
        if($delete)
        {
            return redirect()->back()->with('message', 'Product Deleted Successfully');
        }
    }
}
