<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index() {
        $product=Product::orderBy('id','DESC')->paginate(50);
        return view('admin.product.index',['product'=>$product]);
              }



        public function insert_form()
        {
            $category=Category::all();
            return view('admin.product.add',['category'=>$category]);
        }          
        
        public function insert(Request $request)
        {
            $product=new Product;


            if($request->hasfile('image'))       
            {
                $file=$request->file('image');
                $extention=$file->getClientOriginalExtension();  
                $filename=uniqid().'.'.$extention;
                $file->move('assets/uploads/product',$filename);  //move($destin,$name);  public/
                $product->image=$filename;
            }


            $product->name=$request->input('name');
            $product->slug=$request->input('slug');
            $product->selling_price=$request->input('selling_price');
            $product->qty=$request->input('qty');
            $product->status=$request->input('status')==True ? '1' : '0';
            $product->trending=$request->input('trending')==True ? '1' : '0';
            $product->save();
            return redirect(route('product'))->with('status','product Added!!');
          
        }          




        public function edit($id)
        {
            $product=Product::find($id);
            $category=Category::all();
            return view('admin.product.update',['val'=>$product,'category'=>$category]);
    
        }


        
    public function update(Request $request, $id)
    {
        $product=Product::find($id);


        if($request->hasfile('image'))
        {
            $old_image='assets/uploads/product/'.$product->image;
            if(File::exists($old_image))
            {
                File::delete($old_image);
            }

            $file=$request->file('image');
            $extention=$file->getClientOriginalExtension();
            $filename=uniqid().'.'.$extention;
            $file->move('assets/uploads/product',$filename);
            $product->image=$filename;
        }

        $product->name=$request->input('name');
        $product->slug=$request->input('slug');
        $product->selling_price=$request->input('selling_price');
        $product->qty=$request->input('qty');
        $product->status=$request->input('status')==True ? '1' : '0';
        $product->trending=$request->input('trending')==True ? '1' : '0';
  
        $product->save();
        return redirect(route('product'))->with('status','Product Updated Successfully');
    }



    public function delete($id)
    {
        $product=Product::find($id);
        $old_image='assets/uploads/product/'.$product->image;
        if(File::exists($old_image))
        {
            File::delete($old_image);
        }
        $product->delete();
        return redirect(route('product'))->with('status','Product Deleted Successfully!');
    }


    public function search_result(Request $request)
    {
        $product_name=$request->input('product_name');

        if($product_name!='')
        {
            $product=Product::where('name','LIKE','%'.$product_name.'%')
                             ->paginate(50);
            if($product)
            {
                return view('admin.product.index',['product'=>$product]);
            }
            else
            {
                return redirect()->back()->with('status',"No product matched your search");
            }
       }
    }
}
