 @extends('welcome')
 @section('content')
<style>

    .container1{
        border-top: black solid 2px;
    }
    .container1 .left {
        float:  left;
        width:  18%;
        margin: 10px 0;
        border-right: black solid 2px;
        height: auto;
        border-bottom: black solid 2px;
        margin-left: -15px;
    }

    .container1 .right {
        float: right;
        width: 82%;
    }

    .center1{
        padding-left: 20px;
    }
    .center1 ul {
        border-bottom: black solid 2px;
        margin-right: 5px;
        padding-top: 5px;
        padding-left: 0;
    }
    .center1 ul li {
        padding: 7px;
        font-size: 17px;
        border-radius: 5px;
        font-weight: 400;
        font-family: sans-serif;
        margin-right: 5px;
    }
    .center1 ul li:hover {
        background-color: black;
        color:  white;
        padding-left: 15px;
        transition: 500ms;
    }
    .center1 {
        margin-left: 0;
    }
    .center1 a{
        color: black;
        font-size: 17px;
    }
    .center1 a:hover{
        color: white;
    }
    .center1 h4{
        font-size: 20px;
        font-family: sans-serif;
        font-weight: bold;
    }

    .left .title{
        background-color: black;
        margin-left: -15px;
        padding: 10px;
        color:  white;
    }


    .right .product {
        margin-left: 10px;
        margin-top: 15px;
    }
    .right .title {
        background-color: black;
        color: white;
        padding: 10px;
        margin: 10px 0 0 10px;
        }
    .col1{
        float: left;
        width: 30%;
        border: whitesmoke solid 1px;
        margin-right: 20px;
        margin-left: 25px;
        padding: 10px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .cart1 a{
        color: white;
        font-size: 16px;
        font-family: sans-serif;
    }

    .product .col1 .cart1 {
        background-color: cornflowerblue;
        margin: 20px 0 0 0;
        padding: 10px;
        text-align: center;
        font-size: 16px;
        border-radius: 5px;
    }

    .product .col1 .cart1:hover{
        background-color: black;
        color: white;
        transition: 500ms;
    }


    /*.product .col1 .cart1 a {
        color: black;
    }
    .product .col1 .cart1 a:hover{
        color: white;
    }*/
    .product .col1 img {
        margin: 0 90px;
        width: 250px;
        height: 250px;
    }
    .product .col1 img:hover {
        width: 260px;
        height: 260px;
        transition: 400ms;
    }
</style>
<div class="container1">
    <div class="left">
        <div class="title">
            <center><h4>CATEGORIES</h4></center>
        </div>
        <div class="center1">
            <h4><a href="#">CAMERAS</h4></a>
            <ul>
                <a href="#"><li>SONY</li></a>
                <a href="#"><li>LEICA</li></a>
                <a href="#"><li>NIKON</li></a>
                <a href="#"><li>CANON</li></a>
                <a href="#"><li>SONY</li><a>
                </br>
            </ul>
            <h4><a href="#">LENSES</h4></a>
             <ul>
                <a href="#"><li>SLR Lenses</li></a>
                <a href="#"><li>Mirrorless Lenses</li></a>
                <a href="#"><li>Digital Cine Lense</li></a>
                <a href="#"><li>Rangefinder Lenses</li></a>
                <a href="#"><li>Special Effects Lenses</li></a>
                <br />
            </ul>
            <h4><a href="#">STORAGE</a></h4>
             <ul>
                <a href="#"><li>Films</li></a>
                <a href="#"><li>SD Card</li></a>
                <a href="#"><li>Battery</li></a>
                <br/>
            </ul>
            <a href="#"><h4>TRIPODS</h4></a>
        </div>
    </div>
    <div class="right">
        <div class="title">
            <center><h4>PRODUCTS</h4></center>
        </div>
        <div class="product">
            <div class="col1">
                <div>
                    <img src="{{URL::to('frontend/images/pyssurt.png')}}">
                </div>
                <div class="cart1">
                    <span class="fa fa-shopping-cart"><a href="#"> Add to cart</a></span>
                </div>
            </div>
            <div class="col1">
                <div>
                    <img src="{{URL::to('frontend/images/pyssurt.png')}}">
                </div>
                <div class="cart1">
                    <span class="fa fa-shopping-cart"><a href="#"> Add to cart</a></span>
                </div>
            </div>
        </div>
</div>

 @endsection
