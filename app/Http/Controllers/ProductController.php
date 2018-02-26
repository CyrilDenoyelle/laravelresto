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
        settype($price, "float");
        // dump($price);
        if($price<=0){
            return back()->withInput($request->input())
            ->withErrors('Le prix doit etre un chiffre (supperieur à zero)')
            ;
        }

        $product->name = $request->input('name');
        $product->description = $request->input('detail');
        $product->price = number_format($price, 2, '.', '');

        $product->save();
        return redirect('admin')
        ->with('message', 'Produit ajouté')
        ->with('statut', 'added')
        ;
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
        $product = Product::where('id', '=', $id)->first();
        $inputs = ["name" => $product->name, "price" => $product->price, "detail" => $product->description];
        // dump($inputs);
        $product->delete();
        return back()
        ->withInput($inputs)
        ->with('message', 'Vous pouvez modifier votre ellement ici')
        ->with('statut', 'edit')
        ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', '=', $id)->first();
        $product->delete();
        return redirect('admin')->with('message', 'Produit supprimé');
    }
}
