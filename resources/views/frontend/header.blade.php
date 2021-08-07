
<header><!--header-->
        <div class="row">
            <div class="col-4 col-md-12"><!--menu-->
                <div class="button-category">
                    <div class="menu row">
                        <ul>
                            <li class="logo"><a href="index.html"><img src="frontend/img/logo1.jpg" alt=""></a></li>
                            <li class="menu-icon"><img id="img-menu-icon"  src="frontend/img/menu.png" alt=""></li>
                            <div class="menu-contairn">
                                <a href="#"><li class="menu-item">Trang Chủ</li></a>
                                <li class="menu-item">
                                    <a class="navlink" href="#">Sản Phẩm</a>
                                    <ul class="sub-menu">
                                        @foreach($menus as $menu)
                                        <a href="category.html"><li class="">{{$menu->name}}</li></a>
                                       @endforeach
                                    </ul>
                                </li>
                                <a href="javscript:void(0)"><li class="menu-item">Bài Viết</li></a>
                                <a href="#"><li class="menu-item">Liên Hệ</li></a>
                            </div>
                        </ul>
                    </div>
                </div>
            </div><!--end menu-->
        </div>
        <div class="row">
            <div class="col-12">
                <form class="fr-search">
                    <input class="search" placeholder="Tìm kiếm sản phẩm" type="text">
                    <button><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
        <div class="fixedElement row" >
            <div><a href="https://www.facebook.com/gianga.giay"><img src="frontend/img/fb-dark.png"></a></div>
            <div><a href="https://chat.zalo.me/?phone=0975741392"><img src="frontend/img/zl-dark.png"></a></div>
        </div>
    </header><!--end-header-->