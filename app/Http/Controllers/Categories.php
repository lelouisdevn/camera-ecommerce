<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class Categories extends Controller
{
    public function AuthLogin() {
        $AdminId = Session::get('AdminId');
        if($AdminId){
            return Redirect::to('dashboard');
        }
        else return Redirect::to('adminLogin')->send();
    }
    
    public function addProduct() {
        $this->AuthLogin();
        return view('admin.addNewCategory');
    }

    public function listCategories() {
        $this->AuthLogin();
        $allCategories = DB::table('tbl_category_product')->get();

        

        return view('admin.listAllCategories')->with('Categories', $allCategories);
    }

    public function saveCategory(Request $request) {
        $data = array();
        $data['CategoryName'] = $request->CategoryName;
        $data['CategoryDescription'] = $request->CategoryDescription;
        $data['CategoryStatus'] = $request->CategoryStatus;

        DB::table('tbl_category_product')->insert($data);

        Session::put('message', 'Thêm loại sản phẩm thành công!');
        return Redirect::to('addNewCategory');
    }

    public function editCategory($CategoryId) {
        $this->AuthLogin();
        $editCategoryId = DB::table('tbl_category_product')->where('CategoryId', $CategoryId)->get();

        return view('admin.editCategoryProduct')->with('Categories', $editCategoryId);
    }

    public function updateCategory(Request $request, $CategoryId) {
        $data = array();
        $data['CategoryName'] = $request->CategoryName;
        $data['CategoryDescription'] = $request->CategoryDescription;

        DB::table('tbl_category_product')->where('CategoryId', $CategoryId)->update($data);
        echo 'Category updated successfully!';
        return Redirect::to('listAllCategories');
    }

    public function deleteCategory($CategoryId) {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('CategoryId', $CategoryId)->delete();
        echo 'Category deleted successfully';
        return Redirect::to('listAllCategories');
    }

    //end trang admin
    public function showCategory($CategoryId) {
        $Category = DB::table('tbl_category_product')->where('CategoryStatus', '1')->orderby('CategoryId', 'desc')->get();
        $Trademark = DB::table('tbl_trademark')->where('TrademarkStatus', '1')->orderby('TrademarkId', 'desc')->get();

        $Product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.CategoryId', '=', 'tbl_product.CategoryId')
        ->where('tbl_category_product.CategoryId', $CategoryId)->where('tbl_product.ProductStatus', '1')->paginate(6);

        $CategoryName = DB::table('tbl_category_product')->where('tbl_category_product.CategoryId', $CategoryId)->get();

        return view('pages.Category.showCategory')->with('Category', $Category)->with('Trademark', $Trademark)->with('Product', $Product)->with('CategoryName', $CategoryName);
    }
}
