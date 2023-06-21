<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use PDF;
session_start();
class Order extends Controller
{
    //In hoa don - print the bill
    public function printOrder($check) {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->printOrderConvert($check));
        return $pdf->stream();
    }
    public function printOrderConvert($check) {
        $UserInfo = DB::table('tbl_orders')->join('tbl_users', 'tbl_orders.UserId', '=', 'tbl_users.UserId')
        ->join('tbl_shipping', 'tbl_orders.ShippingId', '=', 'tbl_shipping.ShippingId')
        ->where('OrderId', $check)->first();
        $Detail = DB::table('tbl_order_detail')->where('OrderId', $check)->get();
        $output = '';
        $timeOrderPrinting = Carbon::now()->format('d/m/Y');

        $output.='
        <style>
        .hoadon {
            width:100%;
            border: black solid 1px;
            font-family: DejaVu Sans;
            font-size: 15px;
            border-radius: 3px;
        }
        .hoadon .title .logo {
            font-size: 20px;
            font-weight: bold;
            font-family: DejaVu Sans;
            margin-top:10px;
            color:#5361b5;
        }
        .bang {
            text-align: center;
            margin-bottom: 20px;
        }
        .hoadon .title {
            text-align: center;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: grey solid 1px;
        }
        .billinfo {
            font-size: 17px;
            margin-bottom: 10px;
            margin-left: 30px;
        }
        .shippingifo {

        }
        .hoadonbanghang {
            color: red;
            font-weight: bold;
            font-size: 19px;
            text-align: center;
        }
        .footer {
            width: 100%;
            overflow: auto;
        }
        .footer .left {
            width: 50%;
            float: left;
            text-align: center; 
        }
        .footer .right {
            width: 50%;
            float: right;
            text-align: center;
        }
        table {
            border: black solid 1px;
            width: 95%;
            margin: 0 auto;
            border-collapse: collapse;
            text-align: center;
        }
        table>tr td{
            font-weight: bold;
        }
        table tr td{
            border: black solid 1px;
        }
        .block {
            height: 30px;
            width: 30px;
        }
    </style>

    <div class="hoadon">
        <div class="title">
            <div class="logo">Atlanteans LLC Việt Nam</div>
            <div>--------------------------</div>
            <div>Mã số thuế: daylamasothue</div>
            <div>Địa chỉ: Đường 3/2, p An Khánh, q Ninh Kiều, TP Cần Thơ</div>
            <div>Tài khoản: 0123456789 - Atlanteans - Agribank H. Mỹ Tú, T. Sóc Trăng</div>
            <div>
                <span>Hotline: 0337144072</span>
                <span>  -  </span>
                <span>Email: atlanteans@gmail.com</span>
            </div>
        </div>
       
        <div class="title" style="border-bottom: none;">
            <div class="hoadonbanghang">HÓA ĐƠN BÁN HÀNG</div>
            <div>Ngày: '.$timeOrderPrinting.' - Mã hóa đơn: '.$check.'</div>
        </div>';
        
        $output.='
        
        <div class="billinfo">
            <div style="display: inline-block; margin-bottom: 0;";>Thông tin khách hàng --------------------------------------------------------------------------</div>
            <div>Khách hàng: '.$UserInfo->UserName.'</div>
            <div>Số điện thoại: '.$UserInfo->UserPhoneNumber.'</div>
            <div>Email: '.$UserInfo->UserEmail.'</div>
            <div>Địa chỉ: '.$UserInfo->UserAddress.'</div>
            
        </div>';

        $output.='
        <!-- Ket thuc thong tin nguoi dat hang -->
        <div class="billinfo" style="margin-top: 20px;">Thông tin đơn hàng ------------------------------------------------------------------------------</div>
        <!-- Bang chi tiet cac san pham trong don hang -->
        <div class="bang">

            <table>
                <tr style="font-weight: bold;">
                    <td>STT</td>
                    <td>Sản phẩm</td>
                    <td>Số lượng</td>
                    <td>Đơn giá</td>
                    <td>Thành tiền</td>
                </tr>';
                $i = 1;
                foreach($Detail as $key => $de){
        $output.='
                <tr>
                    <td>'.$i.'</td>
                    <td>'.$de->ProductName.'</td>
                    <td>'.$de->Product_sale_quantity.'</td>
                    <td>'.$de->ProductPrice.'</td>
                    <td>'.$de->Product_sale_quantity * $de->ProductPrice.'</td>
                </tr>';
                $i++;
                }
        $output.='
                <tr>
                    <td style="text-align: right; padding-right: 3px;" colspan="4">Phí vận chuyển</td>
                    <td>'.$UserInfo->ShippingFee.'</td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 3px;" colspan="4">Tổng thanh toán</td>
                    <td>'.$UserInfo->OrderTotalPay.'</td>
                </tr>
            </table>
        </div>

        <div class="bang" style="margin-bottom: 80px;">
            <div style="margin-right: 350px;">
                <div>Khách hàng</div>
                <div style="margin-top: 70px;">
                    '.$UserInfo->UserName.'
                </div>
            </div>
            <span>

            </span>
        </div>
        <div style="text-align:center; margin-bottom:5px;">Cảm ơn bạn đã tin tưởng mua hàng!</div>
    </div>
        
        ';
        return $output;
    }

    //Luu don hang vao CSDL - save order into database
    public function saveOrder(Request $request, $UserId) {
        $data = array();
        $data['Payment_Method'] = $request->payment;
        $paymentId = DB::table('tbl_payment')->insertGetId($data);

        $orderData = array();
        $orderData['UserId'] = $UserId;
        $orderData['OrderReceivingPlace'] = $request->address;

        $UserAddress = array();
        $UserAddress['UserAddress'] = $request->address;
        
        $orderData['ShippingId'] = $request->ShippingId;
        $orderData['OrderPhoneNumber'] = $request->phone;
        $orderData['OrderName'] = $request->name;
        $orderData['OrderTotalPay'] = $request->totalpay;
        $orderData['Payment_Id'] = $paymentId;
        $orderData['OrderStatus'] = "Đang xử lý";
        $orderData['OrderTime'] = Carbon::now()->format('d-m-Y H:i:s');
        $OrderId = DB::table('tbl_orders')->insertGetId($orderData);
        
        DB::table('tbl_users')->where('UserId', $UserId)->update($UserAddress);
        
        $info = DB::table('tbl_cart')->join('tbl_product', 'tbl_product.ProductId', '=', 'tbl_cart.ProductId')
        ->where('UserId', $UserId)->get();

        //Insert vao Order_detail
        foreach($info as $key => $ct) {
            $data_detail = array();
            $data_detail['OrderId'] = $OrderId;
            $data_detail['ProductId'] = $ct->ProductId;
            $data_detail['ProductName'] = $ct->ProductName;
            $data_detail['ProductPrice'] = $ct->ProductPrice;
            $data_detail['Product_sale_quantity'] = $ct->Product_sale_quantity;
            DB::table('tbl_order_detail')->insert($data_detail);

            $product_qty_after = array();
            $sl = DB::table('tbl_product')->where('ProductId', $ct->ProductId)->get();
            foreach ($sl as $key => $sll)
            $product_qty_after['ProductQuantity'] = $sll->ProductQuantity - $ct->Product_sale_quantity;
            $product_qty_after['ProductSaled'] = $sll->ProductSaled + $ct->Product_sale_quantity;
            DB::table('tbl_product')->where('ProductId', $ct->ProductId)->update($product_qty_after);
            // $sl = DB::table('tbl_product')->where('ProductId', $ct->id)->select('ProductQuantity')->get();
            // $sl_new = parse_str($sl) - $ct->qty;
            // DB::table('tbl_product')->update('ProductQuantity', $sl_new);
        }
        
        DB::table('tbl_cart')->where('UserId', $UserId)->delete();

        return redirect::to('sendmail');
    }
    // //Thong bao dat hang thanh cong - announce the customers the orders have been placed
    // public function announcement() {
    //     $category = DB::table('tbl_category_product')->where('CategoryStatus', '1')->orderby('CategoryId', 'desc')->get();
    //     $trademark = DB::table('tbl_trademark')->where('TrademarkStatus', '1')->orderby('TrademarkId', 'desc')->get();
    //     return view('mailsent')->with('Category', $category)->with('Trademark', $trademark);
    // }
    //Xem chi tiet don hang - see more details about an order
    public function seeOrderDetail($OrderId) {
        $Order = DB::table('tbl_orders')->join('tbl_shipping', 'tbl_shipping.ShippingId', '=', 'tbl_orders.ShippingId')->where('OrderId', $OrderId)->get();
        $detail = DB::table('tbl_order_detail')->join('tbl_product', 'tbl_order_detail.ProductId', '=', 'tbl_product.ProductId')
        ->where('tbl_order_detail.OrderId', $OrderId)->get();
        $payment = DB::table('tbl_orders')->join('tbl_payment', 'tbl_payment.Payment_Id', '=', 'tbl_orders.Payment_Id')
        ->where('tbl_orders.OrderId', $OrderId)->get();
        return view('admin.seeOrderDetail')->with('Order', $Order)->with('detail', $detail)->with('payment', $payment);
    }
    //Thay doi trang thai don hang - change order status
    public function changeOrderStatus(Request $request, $OrderId) {
        $value = array();
        $getValue = $request->abc;
        if($getValue === "1"){
            $value['OrderStatus'] = "Đang giao";
            DB::table('tbl_orders')->where('OrderId', $OrderId)->update($value);
        }elseif($getValue === "2"){
            $value['OrderStatus'] = "Đã giao";
            DB::table('tbl_orders')->where('OrderId', $OrderId)->update($value);
        }elseif($getValue === "3") {

            $value['OrderStatus'] = "Đang xử lý";
            DB::table('tbl_orders')->where('OrderId', $OrderId)->update($value);
        }

        $allOrders = DB::table('tbl_orders')
        ->join('tbl_users', 'tbl_users.UserId', '=', 'tbl_orders.UserId')
        ->select('tbl_orders.*', 'tbl_users.UserName')
        ->orderby('tbl_orders.OrderId', 'desc')->paginate(7);
        return view('admin.OrderManagement')->with('allOrders', $allOrders);
    }

    //Xoa don hang - delete orders
    public function deleteOrder($OrderId) {

        $dulieu = DB::table('tbl_order_detail')->where('OrderId', $OrderId)->get();
        foreach($dulieu as $key => $dl)
            $ProductId = $dl->ProductId;
            $Quantity = $dl->Product_sale_quantity;
            $update = array();
            $soluongcu = DB::table('tbl_product')->where('ProductId', $ProductId)->get();
            foreach($soluongcu as $key => $sl)

            $update['ProductQuantity'] = $sl->ProductQuantity + $Quantity;
            DB::table('tbl_product')->where('ProductId', $ProductId)->update($update);


        DB::table('tbl_order_detail')->where('OrderId', $OrderId)->delete();
        DB::table('tbl_orders')->where('OrderId', $OrderId)->delete();

        $allOrders = DB::table('tbl_orders')
        ->join('tbl_users', 'tbl_users.UserId', '=', 'tbl_orders.UserId')
        ->select('tbl_orders.*', 'tbl_users.UserName')
        ->orderby('tbl_orders.OrderId', 'desc')->get();
        return view('admin.OrderManagement')->with('allOrders', $allOrders);
    }

    public function cancelOlder($OrderId) {
        $UserId = Session::get('UserId');
        DB::table('tbl_orders')->where('OrderId', $OrderId)->delete();
        Session::put('message', 'Hủy đơn hàng thành công!');
        return redirect::to('UserOrder/'.$UserId);
    }
}
