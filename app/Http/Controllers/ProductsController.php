<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Phase;
use Storage;
use Laracasts\Flash\Flash;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','DESC')->paginate(10);
        return view('admin.products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $phases = Phase::orderBy('name','ASC')->lists('name','id');
        //dd($phases);
        return view('admin.products.create')->with('phases',$phases);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Manipulacion de imagen
        if ($request->file('image')) 
        {
            $file = $request->file('image');
            $name = 'teomabolivia_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/images/products/';
            $file->move($path,$name);
        }
        $product = new Product($request->all());
        $product->image = $name;
        $product->user_id = \Auth::user()->id;
        $product->save();
        
        Flash::success("Se el producto " . $product->name ." de forma exitosa!");
        return redirect()->route('admin.products.index');
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
        $product = Product::find($id);
        $product->phase;
        
        $phases = Phase::orderBy('name','DESC')->lists('name','id');
        return view('admin.products.edit')->with('product',$product)->with('phases',$phases);
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
        $product = Product::find($id);
        $product->cod =$request->input('cod');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        if ($request->hasFile('image')) {
            //add new image
            $file = $request->file('image');
            $name = 'teomabolivia_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/images/products/';
            $file->move($path,$name);
            $oldImage = $product->image;
            //update the database
            $product->image = $name;
            //Delete the old photo
            Storage::delete($oldImage);
        }
        $product->punctuation = $request->input('punctuation');
        $product->price_business_bol = $request->input('price_business_bol');
        $product->price_customers_bol = $request->input('price_customers_bol');
        $product->price_business_sol = $request->input('price_business_sol');
        $product->price_customers_sol = $request->input('price_customers_sol');
        $product->price_business_dollar = $request->input('price_business_dollar');
        $product->price_customers_dollar = $request->input('price_customers_dollar');
        $product->phase_id = $request->input('phase_id');
        $product->user_id = \Auth::user()->id;
        $product->save();

        Flash::warning('El producto '.$product->name.' ha sido actualizado!');
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        Storage::delete($product->image);
        $product->delete();

        Flash::error("El producto " . $product->name ." fue eliminado de forma exitosa!");
        return redirect()->route('admin.products.index');
    }
}
