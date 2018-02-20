<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Users;
// use App\Commandes;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;

        if(Product::where('name', $request->input('name'))->first()){
            return back()->withInput($request->input())
            ->withErrors('Ce nom est deja utilisé pour un produit')
            ;
        }

        $price = $request->input('price');
        settype($price, "int");
        // dump($price);
        if($price<=0){
            return back()->withInput($request->input())
            ->withErrors('Le prix doit etre un chiffre (supperieur à zero)')
            ;
        }

        $product->name = $request->input('name');
        $product->description = $request->input('detail');
        $product->price = $price;

        $product->save();
        return redirect('admin');
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
