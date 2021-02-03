<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Pivote;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total  = Bill::sum('total');
        $pivotes = Pivote::all();
        $products = Product::all();
        return view('admin.home', ['products'=> $products,
        'pivotes'=> $pivotes,
        'total' => $total
        ]);     
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
        $codigo = $request->input('codigo');
        $product = Product::where('code', $codigo )->first();
        if(!empty($product)){
            $pivote = new Pivote();
            $pivote->code = $codigo; 
            $pivote->name = $product['name'];
            $pivote->price =  $product['price_public'];
            $pivote->discount = 0;
            $pivote->save();
            return redirect()->route('home');
        }
        
    /*   echo '<script type="text/javascript">
         alert( "'.$product['name'].'");
        </script>';*/

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
        Pivote::destroy($id);
        return redirect('admin/home');
    }

    public function charge(Request $request){
     $bill = new Bill();
     $quantity = $request->input('quantity');
     $total = $request->input('total');
     $date = date('Y-m-d');
     $bill->total = $total;
     $bill->quantity = $quantity;
     $bill->date = $date;
     $bill->save();
     Pivote::truncate();
      
     return redirect('admin/home');
    }
}
