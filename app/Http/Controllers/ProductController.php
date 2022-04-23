<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('product', ["products" => $data]);
    }
    public function details($id)
    {
        $data = Product::find($id);
        return view('detail', ['product' => $data]);
    }
    public function search(Request $req)
    {
        $data = Product::where('name', 'like', '%' . $req->input('query') . '%')->get();
        return View('search', ['products' => $data]);
    }
    public function AddToCart(Request $req)
    {
        if ($req->session()->get('user')) {
            $chart = new Cart();
            $chart->user_id = $req->session()->get('user')['id'];
            $chart->product_id = $req->input('product_id');
            $chart->save();
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }
    public  static function usercartCount()
    {
        $user_id = Session::get('user')['id'];
        return Cart::where('user_id', $user_id)->count();
    }
    public function getCartList(Request $req)
    {
        if ($req->session()->has('user')) {
            $user_id = $req->session()->get('user')['id'];
            $cart_list = DB::select("SELECT p.*,sm.updated_at FROM products AS p JOIN 
(SELECT product_id,updated_at FROM `chart` AS c WHERE c.user_id=?) AS sm ON sm.product_id=p.id", [$user_id]);
            return View("CartList", ["cart_list" => $cart_list]);
        } else {
            return
                redirect('/login');;
        }
    }
    public function Remove_from_cart($id)
    {
        DB::delete("DELETE FROM `chart` WHERE user_id=? AND product_id=?", [Session::get('user')['id'], $id]);
        return redirect('/cart-list');
    }
    public function OrderNow(Request $req)
    {
        if ($req->session()->has('user')) {
            $user_id = $req->session()->get('user')['id'];
            $total = DB::select("SELECT SUM(p.price) AS total FROM products AS p JOIN 
(SELECT product_id,updated_at FROM `chart` AS c WHERE c.user_id=?) AS sm ON sm.product_id=p.id", [$user_id]);
            return View("ordernow", ["total" => $total[0]->total]);
        } else {
            return
                redirect('/login');;
        }
    }
    public function PlaceOrder(Request $req)
    {
        if ($req->session()->has('user')) {
            try {
                $user_id = $req->session()->get('user')['id'];
                $chartList = Cart::where("user_id", $user_id)->get();
                foreach ($chartList as  $value) {
                    $order = new Order();
                    $order->product_id = $value->product_id;
                    $order->user_id = $user_id;
                    $order->status = "pending";
                    $order->payment_method = $req->input('paymentradio');
                    $order->payment_status = "pending";
                    $order->address = $req->input('address');
                    $order->save();
                }
                Cart::where("user_id", $user_id)->delete();
                return redirect("/");
            } catch (\Throwable $th) {
                report($th);
                return false;
            }
        } else {
            return redirect('/login');
        }
    }
    public function getOrderList()
    {
        if (Session::has('user')) {
           $oderList=DB::select("SELECT a.*,b.* FROM `products` AS b JOIN
(SELECT * FROM `orders` WHERE user_id=?) AS a ON a.product_id=b.id",[Session::get('user')['id']]);
            return View('orderlist',['orders'=>$oderList]);
        } else {
            return redirect('/login');
        }
    }
}
