<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
{
    public function AuthLogin() {
        $AdminId = Session::get('AdminId');
        if($AdminId){
            return Redirect::to('dashboard');
        }
        else return Redirect::to('adminLogin')->send();
    }
    public function addNewProduct() {
        $this->AuthLogin();
        $product = DB::table('tbl_category_product')->orderby('CategoryId', 'desc')->get();
        $trademark = DB::table('tbl_trademark')->orderby('TrademarkId', 'desc')->get();

        return view('admin.addNewProduct')->with('product', $product)->with('trademark', $trademark);
    }

    public function listAllProduct() {
        $this->AuthLogin();
        $allProduct = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_product.CategoryId', '=', 'tbl_category_product.CategoryId' )
        ->join('tbl_trademark', 'tbl_product.TrademarkId', '=', 'tbl_trademark.TrademarkId')
        ->orderby('tbl_product.ProductId', 'desc')->paginate(5);

        

        return view('admin.listProduct')->with('Product', $allProduct);
    }

    public function saveProduct(Request $request) {
        $data = array();
        $data['ProductName'] = $request->ProductName;
        $data['ProductDescription'] = $request->ProductDescription;
        $data['ProductContent'] = $request->ProductContent;
        $data['ProductQuantity'] = $request->ProductQuantity;
        $data['ProductPrice'] = $request->ProductPrice;
        $data['ProductStatus'] = $request->ProductStatus;
        
        $data['TrademarkId'] = $request->TrademarkId;
        $data['CategoryId'] = $request->CategoryId;

        $getImage = $request->file('ProductImage');

        if($getImage){
            $getName = $getImage->getClientOriginalName();
            $stName = current(explode('.', $getName));
            $newImage = $stName.rand(0, 99).'.'.$getImage->getClientOriginalExtension();
            $getImage->move('public/Uploads/Products', $newImage);
            $data['ProductImage'] = $newImage;
            $ProductId = DB::table('tbl_product')->insertGetId($data);
            return Redirect::to('addProductDetail/'.$ProductId);
        }
    }

    public function editProduct($ProductId) {
        $this->AuthLogin();
        $editProduct = DB::table('tbl_product')->where('ProductId', $ProductId)->get();
        $product = DB::table('tbl_category_product')->orderby('CategoryId', 'desc')->get();
        $trademark = DB::table('tbl_trademark')->orderby('TrademarkId', 'desc')->get();
        
        return view('admin.editProduct')->with('Product', $editProduct)->with('product', $product)->with('trademark', $trademark);
    }

    public function updateProduct(Request $request, $ProductId) {
        $data = array();
        $data['ProductName'] = $request->ProductName;
        $data['ProductDescription'] = $request->ProductDescription;
        $data['ProductContent'] = $request->ProductContent;
        $data['ProductQuantity'] = $request->ProductQuantity;
        $data['ProductPrice'] = $request->ProductPrice;
        $data['TrademarkId'] = $request->TrademarkId;
        $data['CategoryId'] = $request->CategoryId;
        $data['ProductStatus'] = $request->ProductStatus;
        $getImage = $request->file('ProductImage');

        if($getImage){
            $getName = $getImage->getClientOriginalName();
            $stName = current(explode('.', $getName));
            $newImage = $stName.rand(0, 99).'.'.$getImage->getClientOriginalExtension();
            $getImage->move('public/Uploads/Products', $newImage);
            $data['ProductImage'] = $newImage;
            DB::table('tbl_product')->where('ProductId', $ProductId)->save($data);
            return Redirect::to('listAllProduct');
        }

        DB::table('tbl_product')->where('ProductId', $ProductId)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công!');
        return Redirect::to('listAllProduct');        


        // DB::table('tbl_product')->where('ProductId', $ProductId)->update($data);
        // Session::put('message', 'Product added successfully!');
        // return Redirect::to('listAllProduct');
    }

    public function deleteProduct($ProductId) {
        $this->AuthLogin();
        DB::table('tbl_product')->where('ProductId', $ProductId)->delete();
        echo 'Product deleted successfully';
        return Redirect::to('listAllProduct');
    }

    //End
    public function showProduct() {
        $Category = DB::table('tbl_category_product')->where('CategoryStatus', '1')->get();
        $Trademark = DB::table('tbl_trademark')->where('TrademarkStatus', '1')->get();
        
        $Product = DB::table('tbl_product')->where('ProductStatus', '1')->orderby('ProductSaled', 'desc')->paginate(6);
        return view('pages.Product.showProduct')->with('Category', $Category)
        ->with('Trademark', $Trademark)->with('Product', $Product);
    }

    public function showDetails($ProductId) {
        $Category = DB::table('tbl_category_product')->where('CategoryStatus', '1')->get();
        $Trademark = DB::table('tbl_trademark')->where('TrademarkStatus', '1')->get();
        $Product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_product.CategoryId', 'tbl_category_product.CategoryId')->join('tbl_trademark','tbl_trademark.TrademarkId', 'tbl_product.TrademarkId')->where('tbl_product.ProductStatus', '1')->where('tbl_product.ProductId', $ProductId)->get();

        foreach($Product as $key => $pk)
            $CategoryId = $pk->CategoryId;

        $RelatedProduct = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.CategoryId', '=', 'tbl_product.CategoryId')->join('tbl_trademark', 'tbl_trademark.TrademarkId', '=', 'tbl_product.TrademarkId')->where('tbl_category_product.CategoryId', $CategoryId)->whereNotIn('tbl_product.ProductId', [$ProductId])->limit('3')->get();

        $comment = DB::table('tbl_comment')->join('tbl_users', 'tbl_comment.UserId', '=', 'tbl_users.UserId')->where('ProductId', $ProductId)->Orderby('tbl_comment.CommentId', 'desc')->get();

        $detail = DB::table('tbl_product_detail')->where('ProductId', $ProductId)->get();
        return view('pages.Product.ProductDetails')->with('Category', $Category)->with('Trademark', $Trademark)->with('Product', $Product)->with('RelatedProduct', $RelatedProduct)
        ->with('detail', $detail)->with("Comment", $comment);
    } 
    public function addProductDetail($ProductId) {
        $this->AuthLogin();
        $product = DB::table('tbl_category_product')->orderby('CategoryId', 'desc')->get();
        $trademark = DB::table('tbl_trademark')->orderby('TrademarkId', 'desc')->get();

        return view('admin.addProductDetail')->with('product', $product)->with('trademark', $trademark)->
        with('ProductId', $ProductId);
    }

    public function saveDetail(Request $request, $ProductId) {
        $data = array();
        $data['ProductId'] = $ProductId;
        $data['size'] = $request->size;
        $data['weight'] = $request->weight;
        $data['battery'] = $request->battery;
        $data['resolution'] = $request->resolution;
        $data['fps'] = $request->fps;

        DB::table('tbl_product_detail')->insert($data);
        return redirect::to('listAllProduct');
    }

    //Ham them vao danh sach yeu thich cua nguoi dung 1 san pham
    public function addToWishlist($ProductId) {
        $UserId = session::get('UserId');
        if($UserId){
            $data = array();
            $data['ProductId'] = $ProductId;
            $data['UserId'] = $UserId;
            DB::table('tbl_wishlist')->insert($data);
            return redirect::to('/ProductDetail/'.$ProductId);
        }
        else return redirect::to('/UserLogin');
        
    }

    public function removeFromWishlist($ProductId) {
        $UserId = session::get('UserId');
        DB::table('tbl_wishlist')->where('UserId', $UserId)->where('ProductId', $ProductId)->delete();
        return redirect::to('ProductDetail/'.$ProductId);
    }
    public function removeFromWishlist1($ProductId) {
        $UserId = session::get('UserId');
        DB::table('tbl_wishlist')->where('UserId', $UserId)->where('ProductId', $ProductId)->delete();
        return redirect::to('displayWishlist/');
    }

    public function editProductDetail($ProductId) {
        $Product = DB::table('tbl_product_detail')->join('tbl_product', 'tbl_product.ProductId', '=', 'tbl_product_detail.ProductId')
        ->where('tbl_product_detail.ProductId', $ProductId)->get();
        return view('admin.editProductDetail')->with('Product', $Product);
    }

    //Cập nhật chi tiết sản phẩm
    public function updateProductDetail(Request $request, $ProductId) {
        $data = array();
        $data['size'] = $request->size;
        $data['weight'] = $request->weight;
        $data['fps'] = $request->fps;
        $data['battery'] = $request->battery;
        $data['resolution'] = $request->resolution;
        DB::table('tbl_product_detail')->where('ProductId', $ProductId)->update($data);
        return redirect::to('listAllProduct');
    }

}
