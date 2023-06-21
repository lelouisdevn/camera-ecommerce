@extends('productDetails')
@section('content')


@foreach ($Product as $key => $pr)
<div class="right111">
	<div class="product-details"><!--product-details-->
		<div class="col-sm-5">
			<div class="view-product">
				<img src="{{asset('/Uploads/Products/'.$pr->ProductImage)}}" alt="" />
			</div>
		</div>
		<div class="col-sm-7">
			<div class="product-information" style="float: left; width: 55%;"><!--/product-information-->
				<img src="images/product-details/new.jpg" class="newarrival" alt="" />
				<h2>{{ $pr->ProductName }}</h2>


				<span>
					<span>{{ number_format($pr->ProductPrice).' £' }}</span>
					<?php
							$UserId = Session::get('UserId');
							$get = DB::table('tbl_wishlist')->where('ProductId', $pr->ProductId)->where('UserId',$UserId)->first();
							if($get){
					?>
					<span><a href="{{URL::to('removeFromWishlist/'.$pr->ProductId)}}" style="color: red;" class="fa fa-heart"></a></span>
					<?php
					}else{
					?>
					<span><a href="{{URL::to('addToWishlist/'.$pr->ProductId)}}" style="color: red;" class="fa fa-heart-o"></a></span>
					<?php
						}
					?>
				</span><br />

				<form action="{{URL::to('saveToCart')}}" method="POST">
					{{ csrf_field() }}
					<span>

						<label>Chọn số lượng:</label>
						<input type="number" name="ProductQuantity" min="1" max="5" value="1" />
						<input type="hidden" name="ProductId_Hidden" value="{{$pr->ProductId}}" />
						<button submit class="btn btn-fefault cart">
							<i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
						</button>
					</span>
				</form>

				<p>Còn <b>{{ $pr->ProductQuantity }}</b> sản phẩm.</p>
				<p>Đã bán: <b>{{ $pr->ProductSaled }}</b></p>
				<br>
				<p><b>Thương hiệu:</b> {{ $pr->TrademarkName }}</p>
				<p><b>Loại sản phẩm:</b> {{ $pr->CategoryName }}</p>
				<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
			</div><!--/product-information-->
			<div class="col-sm-5" style="float: right; width: 45%; margin-top: 60px;">
				<span style="font-size: 16px;">
				<p style="text-align: center; font-size: 22px; font-weight: bold;">Mô tả sản phẩm</p>
				@foreach($Product as $key => $pr)
						<p style=" text-align: justify;">{{ $pr->ProductDescription }}</p>
				@endforeach
				</span>
			</div>
		</div>
	</div><!--/product-details-->
</div>
@endforeach


<style type="text/css">
	.productdetailbar {
		width: 90%;
		background-color: #5361b5;
		padding: 20px;
		border-radius: 5px;
	}

	.productdetailbar span{
		width: 50px;
		height: 20px;
		background-color: #5361b5;
		color: white;
		padding: 20px;
		font-size: 17px;

	}
	.productdetailbar .a span:hover {
		background-color: black;
	}
	.comment {
		margin-top: 20;
		background-color: whitesmoke;
		border: lightgray soilid 2px;
		margin-bottom: 20px;
		font-size: 13px;
		padding:  10px;
		border-radius: 5px;

	}
	.reviewproduct {
		padding: 15px;
		background: #ff7168;
		color: white;
		font-size: 18px;
		margin-top:  20px;
		margin-bottom: 10px;
		border-radius: 5px;
	}
	.commentcontent{
		font-size: 15px;
		text-align: justify;
	}
	.nutgui {
		background-color: #5361b5;
		border-radius: 5px;
		margin-top: 10px;
		color: white;
		padding: 10px 30px;
		border: solid lightgray 1px;
	}
	.nutgui:hover {
		background: #5361b5;
		transition: 400ms;
	}
</style>

<!-- <div class="category-tab shop-details-tab">category-tab -->
	<!-- <div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#details" data-toggle="tab">Specs</a></li>
			<li><a href="#tag" data-toggle="tab">Related Products</a></li>
			<li><a href="#content" data-toggle="tab">About Product</a></li>
		</ul>
	</div> -->


	<!-- <div class="tab-content"> -->




		<!-- <div class="tab-pane fade" id="tag" >
			@foreach ($RelatedProduct as $key => $rk)
			<a href="{{URL::to('/ProductDetail/'.$rk->ProductId)}}">
				<div class="product">
					<div class="col1">
						<div>
						    <img src="{{URL::to('/Uploads/Products/'.$rk->ProductImage)}}">
						</div>
						<div class="container2">
						    <div class="left1" style="color: #fe876f; font-weight: bold;">
						        {{ number_format($rk->ProductPrice).' £' }}
						    </div>
						    <div class="right1">
						    	{{ $rk->ProductName }}
						    </div>
						</div>
						<div class="cart1">
						    <span class="fa fa-shopping-cart">
						    	<a href="{{URL::to('/ProductDetail/'.$rk->ProductId)}}"> See Product</a>
						    </span>
						</div>
					</div>
				</div>
			</a>
			@endforeach
		</div> -->
		<!-- @foreach($Product as $key => $pr)
			<div style="font-size: 16px; font-weight: bold; margin-bottom: 7px;">
				{{ $pr->ProductDescription }}
			</div>
			<div>
				<?php
					$a = htmlspecialchars( $pr->ProductContent );
					echo $a;
				?>
			</div>
			@endforeach -->

	<!-- </div>
</div>/category-tab -->
<style>
		.tableux {
			background: whitesmoke;
			border-radius: 5px;
			padding: 5px;
			overflow: auto;
			width: 50%;
			text-align: center;
		}
		.tableux div div{
			font-size: 18px;
			padding: 0 10px;

		}
		.tableux .left {
			width: 50%;
			padding: 10px;
			font-size: 18px;
			float: left;
		}

		.tableux .right {
			width: 50%;
			font-size: 18px;
			padding: 10px;
			float: right;
		}
	</style>
<div>
<div style="margin-left: 15px; width: 98%; margin-bottom: 50px;">
<div style="margin-left: 21px;">
	<div style="background: grey; float: left; width: 43%; padding: 0.5px; margin-top: 15px;">

	</div>
	<div style="float: left; width: 14%; font-size: 19px; text-align: center; font-weight: bold;
	border-radius: 5px; background: #ff7168; color: whitesmoke;">
		Thông số kỹ thuật
	</div>
	<div style="background: grey; float: left; width: 43%; padding: 0.6px; margin-top: 15px;">

	</div>
</div>
		<br/>
		<br>
		<br>
	<div style="margin: 0 auto;" class="tableux">
			@foreach ($detail as $key => $de)
			<!-- <div style="font-size: 20px; font-weight: bold; text-align: center;">PRODUCT SPECIFICATIONS</div> -->
			<div class="tableux left">
				<div>
					Kích thước:
				</div>
				<div>Trọng lượng:</div>
				<div>Dung lượng pin</div>
				<div>Độ phân giải</div>
				<div>Tỉ lệ khung hình/giây</div>
			</div>
			<div class="tableux right">
				<div>{{ $de->size }}</div>
				<div>{{ $de->weight }}</div>
				<div>{{ $de->battery }}</div>
				<div>{{ $de->resolution }}</div>
				<div>{{ $de->fps }}</div>
			</div>
			@endforeach
		</div>
	</div>
</div>



<div style="width: 98%; margin-left: 15px;">
<div style="margin-left: 21px;">
			<div style="background: grey; float: left; width: 45%; padding: 0.5px; margin-top: 15px;">

			</div>
			<div style="float: left; width: 10%; font-size: 19px; text-align: center; font-weight: bold;
			border-radius: 5px; background: #ff7168; color: whitesmoke;">
				Đánh giá
			</div>
			<div style="background: grey; float: left; width: 45%; padding: 0.6px; margin-top: 15px;">

			</div>
</div>
			<br>
			<br>

	<div style="margin-left: 20px;">
			@foreach($Product as $key => $pr)
			<div style="text-align: center; font-size: 20px; font-weight: bold;">
				{{ $pr->ProductName }}
			</div>
			<br>
			<div style="font-size: 17px; margin: 0 20%; text-align: justify;">
				<?php
					// $a = htmlspecialchars( $pr->ProductContent,ENT_COMPAT );
					// echo ($a);
					$str = $pr->ProductContent;
					$myVar = htmlentities($str, ENT_QUOTES);
					echo '<prev>';
					echo $str;
					echo '</prev>';
				?>
			</div>
			@endforeach
	</div>
</div>
<div style="width: 98%; margin-left: 15px; margin-bottom: 30%; margin-top: 50px;">
<div style="margin-left: 21px;">
	<div style="background: grey; float: left; width: 42%; padding: 0.5px; margin-top: 15px;">

	</div>
	<div style="float: left; width: 16%; font-size: 19px; text-align: center; font-weight: bold;
	border-radius: 5px; background: #ff7168; color: whitesmoke">
		Sản phẩm gợi ý
	</div>
	<div style="background: grey; float: left; width: 42%; padding: 0.6px; margin-top: 15px;">

	</div>
</div>
	<br><br>
	<div>
	@foreach ($RelatedProduct as $key => $rk)
			<a href="{{URL::to('/ProductDetail/'.$rk->ProductId)}}">
				<div class="product">
					<div class="col1">
						<div>
						    <img src="{{URL::to('/Uploads/Products/'.$rk->ProductImage)}}">
						</div>
						<div class="container2">
						    <div class="left1" style="color: #fe876f; font-weight: bold;">
						        {{ number_format($rk->ProductPrice).' £' }}
						    </div>
						    <div class="right1">
						    	{{ $rk->ProductName }}
						    </div>
						</div>
						<div class="cart1">
						    <span class="fa fa-shopping-cart">
						    	<a href="{{URL::to('/ProductDetail/'.$rk->ProductId)}}"> Xem sản phẩm</a>
						    </span>
						</div>
					</div>
				</div>
			</a>
	@endforeach
	</div>
</div>
<div style="width: 98%; margin-left: 15px;">
	<div style="margin-left: 21px;">
		<div style="background: grey; float: left; width: 44%; padding: 0.5px; margin-top: 15px;">
		</div>
		<div style="float: left; width: 12%; font-size: 19px; text-align: center; font-weight: bold;
		border-radius: 5px; background: #ff7168; color: whitesmoke;">
			Bình luận
		</div>
		<div style="background: grey; float: left; width: 44%; padding: 0.5px; margin-top: 15px;">
		</div>
	</div>
<br>
<br>
<div style="float: center; width: 95%; margin: 0 auto;">
	<div style="margin-bottom: 20px;">
		@foreach($Product as $key => $pr)
		<form action="{{URL::to('addComment/'.$pr->ProductId)}}" method="POST">
			{{ csrf_field() }}
			<div style="width: 70%;">
				<?php
					$message = Session::get('message');
					if($message){
						echo $message;
						Session::put('message', null);
					};
				?>
			</div>
			<div style="margin-left: 15px;">
				Đánh giá sản phẩm!
			</div>

<!-- RATE -->
<section id="rate" class="rating">
  <!-- FIFTH STAR -->
  <input type="radio" id="star_5" name="rate" value="5" />
  <label style="font-size: 30px;" for="star_5" title="Five">&#9733;</label>
  <!-- FOURTH STAR -->
  <input type="radio" id="star_4" name="rate" value="4" />
  <label style="font-size: 30px;" for="star_4" title="Four">&#9733;</label>
  <!-- THIRD STAR -->
  <input type="radio" id="star_3" name="rate" value="3" />
  <label style="font-size: 30px;" for="star_3" title="Three">&#9733;</label>
  <!-- SECOND STAR -->
  <input type="radio" id="star_2" name="rate" value="2" />
  <label style="font-size: 30px;" for="star_2" title="Two">&#9733;</label>
  <!-- FIRST STAR -->
  <input type="radio" id="star_1" name="rate" value="1" />
  <label style="font-size: 30px;" for="star_1" title="One">&#9733;</label>
</section>


			<textarea name="content" style="height: 100px; background: white; border: grey solid 1px;
			border-radius: 5px;" placeholder="Bình luận tại đây!"></textarea>
			<button class="nutgui" type="submit">Đăng</button>
		</form>
		@endforeach
	</div>

	@foreach($Comment as $key => $cm)
	<div class="comment">
		<div>
			<span style="font-size: 15px;"><i class="fa fa-user"></i> {{ $cm->UserName }}</span>
			<span style="margin-left: 30px; font-size: 15px;">vào lúc: {{ $cm->CommentTime }}</span>
		</div>
		<div style="border-bottom: whitesmoke solid 1px; margin-bottom: 10px;">
		<?php
			$a = $cm->CommentStar;
			for($i = 1; $i <= $a; $i++){
		?>
			<span class="fa fa-star"></span>
			<?php
			}
			?>
		</div>
		<div class="commentcontent">
			{{ $cm->CommentContent }}
		</div>
	</div>
		@endforeach
</div>
</div>

<div style="float: right; width: 48%; text-align: center; margin-bottom: 20px;">
	<!-- <form method="POST" action="{{URL::to('saveHelpdesk')}}">
		{{ csrf_field() }}
		<div style="font-size: 18px; font-weight: bold; ">
			TECHNICAL ISSUES HELPDESK
		</div>
		<div style="margin-top: 10px;">
			<input style="width: 70%; padding: 5px 6px;" type="Email" name="Email" placeholder="Enter your email address:">
		</div>
		<div style="margin-top: 10px;">
			<input style="width: 70%; padding: 5px 6px;" type="number" name="OrderId" placeholder="Enter your order number:">
		</div>
		@foreach ($detail as $key => $de)
			<div style="margin-top: 10px;">
				<input style="width: 70%; padding: 5px 6px;" type="hidden" name="ProductIdHidden" value="{{ $de->ProductId }}">
			</div>
		@endforeach
		<?php
			$UserId1 = Session::get('UserId');
		?>
			<div style="margin-top: 10px;">
				<input style="width: 70%; padding: 5px 6px;" type="hidden" name="UserId" value="{{ $UserId1 }}" placeholder="Enter your email address:">
			</div>

		<textarea style="height: 100px; width: 70%; margin-top: 10px;/* margin-bottom: 10px; */
			background: white; border: grey solid 1px; border-radius: 5px; padding: 6px;" type="text"
			name="HelpdeskContent" class="content" placeholder="Tell something to us..."></textarea>

		<div style="text-align: left; margin-left: 14.5%;">
			<button style="padding: 10px 25px; background: #5361b5; color:  white; border: none; border-radius: 5px;
			margin: 5px">Send</button>
		</div>
	</form> -->
	<div>
		<!-- <img width="400px" height="560px" src="{{asset('/frontend/images/atlanteans.png')}}" alt="hinh ne"> -->
	</div>

</div>





<!-- Css cho sao danh gia -->
<style>
	body {


  -webkit-font-smoothing: antialiased;
}

/* - - - - - RATINGS */
.rating {

  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 150px;
  height: 30px;
  padding: 0 10px;
  margin-bottom: 20px;
  width: 170px;
  border-radius: 30px;
  background: #FFF;
  display: block;
  overflow: hidden;



  unicode-bidi: bidi-override;
  direction: rtl;
}
.rating:not(:checked) > input {
  display: none;
}

/* - - - - - RATE */
#rate {
  top: -65px;
}
#rate:not(:checked) > label {
  cursor:pointer;
  float: right;
  width: 30px;
  height: 30px;
  display: block;

  color: rgba(0, 135, 211, .4);
  line-height: 33px;
  text-align: center;
}
#rate:not(:checked) > label:hover,
#rate:not(:checked) > label:hover ~ label {
  color: rgba(0, 135, 211, .6);
}
#rate > input:checked + label:hover,
#rate > input:checked + label:hover ~ label,
#rate > input:checked ~ label:hover,
#rate > input:checked ~ label:hover ~ label,
#rate > label:hover ~ input:checked ~ label {
  color: rgba(0, 135, 211, .8);
}
#rate > input:checked ~ label {
  color: rgb(0, 135, 211);
}
/* - - - - - LIKE */
#like {
  bottom: -65px;
}
#like:not(:checked) > label {
  cursor:pointer;
  float: right;
  width: 30px;
  height: 30px;
  display: block;

  color: rgba(233, 54, 40, .4);
  line-height: 33px;
  text-align: center;
}
#like:not(:checked) > label:hover,
#like:not(:checked) > label:hover ~ label {
  color: rgba(233, 54, 40, .6);
}
#like > input:checked + label:hover,
#like > input:checked + label:hover ~ label,
#like > input:checked ~ label:hover,
#like > input:checked ~ label:hover ~ label,
#like > label:hover ~ input:checked ~ label {
  color: rgba(233, 54, 40, .8);
}
#like > input:checked ~ label {
  color: rgb(233, 54, 40);
}
</style>
@endsection
