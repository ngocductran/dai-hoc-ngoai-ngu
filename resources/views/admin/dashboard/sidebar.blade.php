<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="{{asset('assets/dashboard/img/deskapp-logo.svg')}}" alt="" class="dark-logo">
            <img src="{{asset('assets/dashboard/img/deskapp-logo-white.svg')}}" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="index.html">Dashboard style 1</a></li>
                        <li><a href="index2.html">Dashboard style 2</a></li>
                        <li><a href="index3.html">Dashboard style 3</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Phòng ban</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('get.room')}}">Xem danh sách</a></li>
                        <li><a href="{{route('get.room.create')}}">Thêm</a></li>
                    </ul>
                </li>    
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon icon-copy ion-film-marker"></span><span class="mtext">Sự kiện</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('get.event')}}">Xem danh sách</a></li>
                        <li><a href="{{route('get.event.create')}}">Thêm</a></li>
                    </ul>
                </li>  
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Thông báo</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('get.room')}}">Xem danh sách</a></li>
                        <li><a href="{{route('get.room.create')}}">Thêm</a></li>
                    </ul>
                </li>            
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Công việc</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('get.room')}}">Xem danh sách</a></li>
                        <li><a href="{{route('get.room.create')}}">Thêm</a></li>
                    </ul>
                </li>      
            </ul>
        </div>
    </div>
</div>