<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/frontend/css/news.css')}}">
    <link href="{{asset('/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <title>Tin công nghệ</title>
</head>
<style type="text/css">
    body {
        font-family: sans-serif;
    }
    .nutgui {
        background-color: #5361b5;
        border-radius: 5px;
        margin-top: 3px;
        color: white;
        padding: 10px 30px;
        border:  none;
    }
    .nutgui:hover {
        background: #5361b5;
        transition: 400ms;
    }
    .lietkebinhluan {
        margin-top:  10px;
        font-size: 17px;
        margin-bottom: 7px;
        border-radius: 5px;
        padding: 5px;
        background: whitesmoke;
    }
    .contentnews {


        margin-top: 10px;
        font-size: 17px;
    }
    .footer-news{
        list-style: none;
        padding: 7px;
        margin: 0 auto;
        border-bottom: grey solid 1px;
    }
    .footer-news a {
        text-decoration-color: black;
    }
    .footer-news span {
        color: black;
        font-size: 17px;
        margin-right: 7px;
    }
</style>
<body>
    <div class="news_head">
        <div class="news-head-left" style="text-align:left; font-size:24px; font-weight:bold;"><a href="{{URL::to('/')}}" style="text-decoration: none; color: #042f99; font-family: freemono; padding-left:10px;">Atlanteans</a></div>
        <div class="news-head-left">
            <input type="text" placeholder="Tìm kiếm...">
        </div>
        <?php
            $User = Session::get('UserId');
            if($User){
        ?>
        <div class="news-head-left" style="text-align:right; padding-top:5px;">
            <h3 style="font-size:  17px;">Tech news 24h <a style="font-weight: normal; border-left: black solid 1px; padding-left:5px; text-decoration: none; color:black;" href="{{URL::to('signOut')}}">Đăng xuất</a></h3>
        </div>
        <?php
            }else{
        ?>
        <div class="news-head-left" style="text-align:right; padding-top:5px;">
            <h3>Tin Công nghệ <a style="font-weight: normal; border-left: black solid 1px; padding-left:5px; text-decoration: none; color:black;" href="{{URL::to('UserLogin')}}">Đăng nhập</a></h3>
        </div>
        <?php
            }
        ?>
    </div>


    <div class="container_news">
        <div class="news_left">
            @foreach ($News as $key => $ne)

            <div class="dau_baiviet">
                <div class="title_news" style="font-size:25px;">{{$ne->NewsTitle}}</div>
                <div style="font-size:17px;">Vào: {{$ne->PostAt}} - Đăng bởi: {{$ne->AdminName}}</div>
            </div>
            <div style="margin: 15px 0;">
                <img src="{{asset('/Uploads/News/'.$ne->NewsImage)}}" width="98%;">
            </div>
            <div class="noidung_baiviet" style="text-align:justify; width:98%; font-size: 17px;">
                <?php
                    // $a = htmlspecialchars( $pr->ProductContent,ENT_COMPAT );
                    // echo ($a);
                    $str = $ne->NewsContent;
                    $myVar = htmlentities($str, ENT_QUOTES);
                    echo '<prev>';
                    echo $str;
                    echo '</prev>';
                ?>
            </div>

            <form action="{{URL::to('saveNewsComment/'.$ne->NewsId)}}" method="POST">
                {{ csrf_field() }}
                <div style="margin-top: 30px;">
                    <div>
                        <p style="font-size:20px; color:purple;">Bình luận</p>
                    </div>
                    <div>
                        <textarea placeholder="Nội dung bình luận..." style="width: 97%; padding: 5px; font-family: sans-serif;" rows="5" name="content"></textarea>
                    </div>
                    <div>
                        <button type="submit" name="SliderAdd" class="nutgui">Đăng</button>
                    </div>
                </div>
            </form>
            @endforeach
            <div style="color: purple; font-size: 20px; margin: 30px 0 5px 0; border-bottom: grey solid 1px;">
               Ý kiến bạn đọc
            </div>
            @foreach($Comment as $key => $cm)
            <div class="lietkebinhluan">
                <div>
                    <!-- <span><i class="fa fa-user"></i> {{ $cm->UserName}}
                        vào lúc: {{ $cm->NewsCommentTime }} -->
                    <span style="font-size: 17px;"><i class="fa fa-user"></i> {{ $cm->UserName }}</span>
                    <span style="margin-left: 30px; font-size: 17px;">vào lúc: {{ $cm->NewsCommentTime }}</span>
                </div>
                <div class="contentnews">
                    {{ $cm->NewsCommentContent }}
                </div>
            </div>
            @endforeach
        </div>
        <div class="news_right">
            @foreach($OtherNews as $key => $on)
            <div style="margin-bottom: 10px;">
                <h4 style="margin-bottom:5px;">{{$on->NewsTitle}}</h4>
                <a href="{{URL::to('hotnews/'.$on->NewsId)}}">
                    <img src="{{asset('/Uploads/News/'.$on->NewsImage)}}" width="100%;">
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <?php
        $UserId = Session::get('UserId');
    ?>
    <div style="width:50%; margin: 0 auto; background: whitesmoke;">
        <div class="footer-news">
            <a href="{{ URL::to('/') }}"><span>Trang chu</span></a>
            <a href="{{URL::to('displayProfile/'.$UserId)}}"><span>Trang cua ban</span></a>
            <a href="{{ URL::to('showCarts') }}"><span>Gio hang</span></a>
            <a href="#"><span>Don hang</span></a>
            <a href="mailto:atlanteansvietnam@outlook.com"><span>Lien he</span></a>
            <a href="{{ URL::to('signOut') }}"><span>Dang xuat</span></a>
        </div>
        <div style="margin-top: 20px; font-size: 17px; color: black; text-align:center; margin-bottom:20px;">
            2021 - Copyright by Ngô Trần Vĩnh Thái
        </div>
    </div>
</body>
</html>
