@extends('frontend.main');
@section('content')

<div class="content"><!-- content-->
        <div class="banner row">
            <img class="img-banner" src="frontend/img/banner.jpg" alt="">
        </div>
        <div class="row"><!--sản phẩm mới-->
            <p class="title">Sản phẩm mới</p>
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="row">

                @foreach($product as $pro)
                    <div class="col-6 col-sm-4 col-lg-3 product-card">
                        <img class="icon" src="frontend/img/new.png">
                        <a href="detail.html"><img class="card-img" src="backend/images/{{$pro->thumb}}" alt=""></a>
                        <p class="product-name">{{$pro->name}}</p>
                        <p class="product-price">{{$pro->price}} đ</p>
                        <a href="detail.html" class="btn btnstyle"><i class="fa fa-eye" aria-hidden="true"></i> Xem Ngay</a>
                    </div>
                  
                  @endforeach
                   
                   
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div><!--end sản phẩm mới-->
        <div class="row"><!--sản phẩm nổi bật-->
            <p class="title">Sản phẩm nổi bật</p>
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="row">
                   
                   
                   
                @foreach($featured_products as $pro)
                    <div class="col-6 col-sm-4 col-lg-3 product-card">
                        <img class="icon" src="frontend/img/new.png">
                        <a href="detail.html"><img class="card-img" src="backend/images/{{$pro->thumb}}" alt=""></a>
                        <p class="product-name">{{$pro->name}}</p>
                        <p class="product-price">{{$pro->price}} đ</p>
                        <a href="detail.html" class="btn btnstyle"><i class="fa fa-eye" aria-hidden="true"></i> Xem Ngay</a>
                    </div>
                  
                  @endforeach
                 
                </div>
              
            </div>
            <div class="col-lg-1"></div>
        </div><!--end sản phẩm nổi bật-->
    </div><!--end content-->

    @endsection
    