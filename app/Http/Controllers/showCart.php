<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Cart;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class showCart extends Controller
{

    public function saveToCart(Request $request){
        $UserId = Session::get('UserId');
        if($UserId){
            $data = array();
            $ProductId = $request->ProductId_Hidden;
            $data['ProductId'] = $request->ProductId_Hidden;
            $data['UserId'] = $UserId;
            $data['Product_sale_quantity'] = $request->ProductQuantity;


            DB::table('tbl_cart')->insert($data);

            return Redirect::to('ProductDetail/'.$ProductId);
        }
        else {
            return redirect::to('UserLogin');
        } 
    }

    public function showCarts() {
        $category = DB::table('tbl_category_product')->where('CategoryStatus', '1')->orderby('CategoryId', 'desc')->get();
        $trademark = DB::table('tbl_trademark')->where('TrademarkStatus', '1')->orderby('TrademarkId', 'desc')->get();

        $UserId = Session::get('UserId');
        $info = DB::table('tbl_cart')->join('tbl_product', 'tbl_product.ProductId', '=', 'tbl_cart.ProductId')
        ->where('UserId', $UserId)->get();
        
        return view('pages.cart.saveToCart')->with('Category', $category)->with('Trademark', $trademark)->with('Info', $info);
    }

    public function deleteCartItems($ProductId) {
        $UserId = session::get('UserId');
        DB::table('tbl_cart')->where('UserId', $UserId)->where('ProductId', $ProductId)->delete();
        return Redirect::to('showCarts');
    }
    public function increaseOneItems($ProductId) {
        $UserId = session::get('UserId');
        $data = array();
        $get = DB::table('tbl_cart')->where('UserId', $UserId)->where('ProductId', $ProductId)->get();
        foreach($get as $key => $a){
            $data['Product_sale_quantity'] = $a->Product_sale_quantity + 1;
            DB::table('tbl_cart')->where('UserId', $UserId)->where('ProductId', $ProductId)->update($data);
        }
        return redirect::to('showCarts');
    }

    public function decreaseOneItem($ProductId) {
        $UserId = session::get('UserId');
        $data = array();
        $get = DB::table('tbl_cart')->where('UserId', $UserId)->where('ProductId', $ProductId)->get();
        foreach($get as $key => $a){
            $data['Product_sale_quantity'] = $a->Product_sale_quantity - 1;
            $sl = $a->Product_sale_quantity - 1;
            if($sl <= 0 ){
                DB::table('tbl_cart')->where('UserId', $UserId)->where('ProductId', $ProductId)->delete();
            }
            else {
                DB::table('tbl_cart')->where('UserId', $UserId)->where('ProductId', $ProductId)->update($data);
            }
        }
        return redirect::to('showCarts');
    }

    public function updateQuantity(Request $request) {
        

        return Redirect::to('showCarts');
    }
    public function saveToCart1(Request $request){
        $UserId = Session::get('UserId');
        if($UserId){
            $data = array();
            $ProductId = $request->ProductId_Hidden;
            $data['ProductId'] = $request->ProductId_Hidden;
            $data['UserId'] = $UserId;
            $data['Product_sale_quantity'] = $request->ProductQuantity;


            DB::table('tbl_cart')->insert($data);

            return Redirect::to('displayWishlist/');
        }
        else {
            return redirect::to('UserLogin');
        } 
    }
}
