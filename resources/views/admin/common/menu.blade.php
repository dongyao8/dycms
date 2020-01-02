<nav class="sidebar sidebar-offcanvas" id="sidebar">
	  <ul class="nav">
		<li class="nav-item nav-profile">
		  <a href="" class="nav-link">
			<div class="profile-image">
			  <img class="img-xs rounded-circle" src="{{asset('uploads')}}/head_img/default/26.jpg" alt="profile image">
			  <div class="dot-indicator bg-success"></div>
			</div>
			<div class="text-wrapper">
			  <p class="profile-name">管理员</p>
			  <p class="designation">欢迎访问</p>
			</div>
		  </a>
		</li>
		<li class="nav-item nav-category">管理中心</li>
		<li class="nav-item">
		  <a class="nav-link" href="{{ url('admin/home') }}">
			<i class="menu-icon typcn typcn-document-text"></i>
			<span class="menu-title">首页</span>
		  </a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
			<i class="menu-icon typcn typcn-coffee"></i>
			<span class="menu-title">文章管理</span>
			<i class="menu-arrow"></i>
		  </a>
		  <div class="collapse" id="ui-basic">
			<ul class="nav flex-column sub-menu">
			  <li class="nav-item">
				<a class="nav-link" href="{{ url('admin/category') }}">分类管理</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{ url('admin/article') }}">文章内容</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{ url('admin/comment') }}">文章评论</a>
			  </li>
			</ul>
		  </div>
		</li>
		<!-- <li class="nav-item">
		  <a class="nav-link" href="{{ url('admin/comment') }}">
			<i class="menu-icon typcn typcn-shopping-bag"></i>
			<span class="menu-title">评论管理</span>
		  </a>
		</li> -->
		<li class="nav-item">
		  <a class="nav-link" data-toggle="collapse" href="#navigation" aria-expanded="false" aria-controls="navigation">
			<i class="menu-icon typcn typcn-th-large-outline"></i>
			<span class="menu-title">网站导航</span>
			<i class="menu-arrow"></i>
		  </a>
		  <div class="collapse" id="navigation">
			<ul class="nav flex-column sub-menu">
			  <li class="nav-item">
				<a class="nav-link" href="{{ url('admin/daohang') }}">导航分类</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{ url('admin/navigation') }}">导航网址</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{ url('admin/majorlink') }}">推荐网址</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{ url('admin/shoulu') }}">收录审核</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{ url('admin/link') }}"> 友情链接 </a>
			  </li>
			</ul>
		  </div>
		</li>
		<!-- <li class="nav-item">
		  <a class="nav-link" href="{{ url('admin/link') }}">
			<i class="menu-icon typcn typcn-bell"></i>
			<span class="menu-title">友情链接</span>
		  </a>
		</li> -->
		<li class="nav-item">
		  <a class="nav-link" href="{{ url('admin/user') }}">
			<i class="menu-icon typcn typcn-user-outline"></i>
			<span class="menu-title">用户列表</span>
		  </a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
			<i class="menu-icon typcn typcn-document-add"></i>
			<span class="menu-title">系统配置</span>
			<i class="menu-arrow"></i>
		  </a>
		  <div class="collapse" id="auth">
			<ul class="nav flex-column sub-menu">
			  <li class="nav-item">
				<a class="nav-link" href="{{ url('admin/system') }}"> 基本信息 </a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{ url('admin/mima') }}"> 修改密码 </a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#"> 邮件配置[待完成] </a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#"> 短信配置[待完成] </a>
			  </li>
			  
			  <li class="nav-item">
				<a class="nav-link" href="#"> 支付配置[待完成] </a>
			  </li>
			</ul>
		  </div>
    </li>
    <li class="nav-item">
		  <a class="nav-link" href="{{ url('admin/gout') }}">
			<i class="menu-icon typcn typcn-user-outline"></i>
			<span class="menu-title">退出</span>
		  </a>
		</li>
	  </ul>
	</nav>