<div class="header__customer">
	<div class="first__header">
		<a href="#" class="first__title">TRƯỜNG ĐẠI HỌC NGOẠI NGỮ</a>
		<a href="#" class="second__title">Đăng Nhập</a>
		<img src="/image/vn.png" class="third__image">
	</div>
	<div class="second__header">
		<img src="/image/img-logo.png" class="left__image">
		<div class="right__menu">
			<div class="button__menu">
				<ul class="ul__cus">
					<li class="btn-item">GIỚI THIỆU</li>
					<li class="btn-item dropdown">CƠ CẤU TỔ CHỨC
						<div class="dropdown-content">
							<a href="#">HỘI ĐỒNG TRƯỜNG</a>
							<a href="#">PHÒNG</a>
							<a href="#">KHOA</a>
						</div>
					</li>
					<li class="btn-item">ĐẢNG ỦY-ĐOÀN THỂ</li>
					<li class="btn-item">ĐÀO TẠO</li>
					<li class="btn-item">THƯ VIỆN</li>
					<li class="btn-item">LỊCH TUẦN</li>
					<li class="btn-item">EMAIL</li>
					<li class="btn-item">UFLS CHANNEL</li>
					
				</ul>
			</div>
			<form class="search__menu" role="search" method="post" id="searchform" action="search" >
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<input type="text" value="" name="tukhoa" id="input__search" placeholder="Nhập từ khóa..." required />
				<button id="btn-search"><i class="fa fa-search" type="submit" id="searchsubmit"></i></button>
			</form>
		</div>
	</div>
</div>