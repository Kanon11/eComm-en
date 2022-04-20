<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $data=Product::all();
        return view('product',["products"=>$data]);
    }
    public function details($id)
    {
         $data=Product::find($id);
         return view('detail',['product'=>$data]);
    }
    public function search(Request $req)
    {
        $data=Product::where('name','like','%'.$req->input('query').'%')->get();
        return View('search',['products'=>$data]);
    }
    public function AddToCart(Request $req)
    {
        if ($req->session()->get('user')) {
            $chart=new Cart();
            $chart->user_id= $req->session()->get('user')['id'];
            $chart->product_id =$req->input('product_id') ;
            $chart->save();
            return redirect('/');

        } else {
            return redirect('/login');
        }
        
     

    }
  public  static function usercartCount()
    {
        $user_id=Session::get('user')['id'];
        return Cart::where('user_id',$user_id)->count();
    }
}
