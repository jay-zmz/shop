
    <!-- 头部 -->
    @section('top')
    <div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                                <img src="__admin__/images/logo.png" alt="">
                            </small>
                    </a>
                </div>
                <!-- /Navbar Barnd -->
                <!-- Sidebar Collapse -->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div>
                <!-- /Sidebar Collapse -->
                <!-- Account Area and Settings -->
                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area">
                            <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                    <div class="avatar" title="View your public profile">
                                        <img src="__admin__/images/adam-jansen.jpg">
                                    </div>
                                    <section>
                                        <h2><span class="profile"><span>admin</span></span></h2>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                    <li class="username"><a>David Stevenson</a></li>
                                    <li class="dropdown-footer">
                                        <a href="/admin/user/logout.html">
                                                退出登录
                                            </a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a href="/admin/user/changePwd.html">
                                                修改密码
                                            </a>
                                    </li>
                                </ul>
                                <!--/Login Area Dropdown-->
                            </li>
                            <li>
                                <a href="{:url('Index/clearCache')}" class="login-area dropdown-toggle">
                                    <section>
                                        <h2><span class="profile"><span><i class="menu-icon fa fa-trash-o">&nbsp;&nbsp;</i>清空缓存</span></span></h2>
                                    </section>
                                </a>
                            </li>
                            <!-- /Account Area -->
                            <!--Note: notice that setting div must start right after account area list.
                                no space must be between these elements-->
                            <!-- Settings -->
                        </ul>
                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
    @show
    <!-- /头部 -->
    
    <div class="main-container container-fluid">
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                            <!-- Page Sidebar Header-->
                            <div class="sidebar-header-wrapper">
                                <input class="searchinput" type="text">
                                <i class="searchicon fa fa-search"></i>
                                <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
                            </div>
                            <!-- /Page Sidebar Header -->
                            <!-- Sidebar Menu -->
                            @section('left')
                            <ul class="nav sidebar-menu">
                                <!--Dashboard-->
                                <li>
                                    <a href="#" class="menu-dropdown">
                                        <i class="menu-icon fa fa-shopping-cart"></i>
                                        <span class="menu-text">商品管理</span>
                                        <i class="menu-expand"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="{{url('Goods/lst')}}">
                                                <span class="menu-text">商品列表</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{:url('Goods/add')}">
                                                <span class="menu-text">添加商品</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{:url('Brand/lst')}">
                                                <span class="menu-text">商品品牌</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('admin/cate/lst')}}">
                                                <span class="menu-text">商品分类</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{:url('Type/add')}">
                                                <span class="menu-text">商品类型</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="menu-text">商品回收站</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                    </ul>                            
                                </li> 
                                <li>
                                    <a href="#" class="menu-dropdown">
                                        <i class="menu-icon fa fa-thumbs-up"></i>
                                        <span class="menu-text">推荐位管理</span>
                                        <i class="menu-expand"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="{:url('Recpos/lst')}">
                                                <span class="menu-text">推荐位列表</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{:url('Recpos/add')}">
                                                <span class="menu-text">添加推荐位</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                    </ul>                            
                                </li> 
                                <li>
                                    <a href="#" class="menu-dropdown">
                                        <i class="menu-icon fa fa-random"></i>
                                        <span class="menu-text">栏目关联</span>
                                        <i class="menu-expand"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="{:url('CategoryWords/lst')}">
                                                <span class="menu-text">推荐词关联</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{:url('CategoryBrands/lst')}">
                                                <span class="menu-text">品牌关联</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{:url('CategoryAd/lst')}">
                                                <span class="menu-text">左图关联</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                    </ul>                            
                                </li> 
                                <li>
                                    <a href="#" class="menu-dropdown">
                                        <i class="menu-icon fa fa-money"></i>
                                        <span class="menu-text">促销管理</span>
                                        <i class="menu-expand"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="#">
                                                <span class="menu-text">团购活动</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="menu-text">积分商城</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="menu-text">优惠券</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                    </ul>                            
                                </li>                      
                                <li>
                                    <a href="#" class="menu-dropdown">
                                        <i class="menu-icon fa  fa-legal"></i>
                                        <span class="menu-text">订单管理</span>
                                        <i class="menu-expand"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="{:url('Order/lst')}">
                                                <span class="menu-text">订单列表</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="menu-text">订单查询</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                    </ul>                            
                                </li>
                                <li>
                                    <a href="#" class="menu-dropdown">
                                        <i class="menu-icon fa fa-users"></i>
                                        <span class="menu-text">会员管理</span>
                                        <i class="menu-expand"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="#">
                                                <span class="menu-text">会员列表</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{:url('MemberLevel/add')}">
                                                <span class="menu-text">会员级别</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="menu-text">会员留言</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                    </ul>                            
                                </li>
                                <li>
                                    <a href="#" class="menu-dropdown">
                                        <i class="menu-icon fa fa-sitemap"></i>
                                        <span class="menu-text">数据库管理</span>
                                        <i class="menu-expand"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="#">
                                                <span class="menu-text">数据备份</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="menu-text">数据表优化</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                    </ul>                            
                                </li>
                                <li>
                                    <a href="#" class="menu-dropdown">
                                        <i class="menu-icon fa fa-envelope"></i>
                                        <span class="menu-text">短信管理</span>
                                        <i class="menu-expand"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="#">
                                                <span class="menu-text">发送短信</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="menu-text">短信签名</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                    </ul>                            
                                </li>
                                <li>
                                    <a href="#" class="menu-dropdown">
                                        <i class="menu-icon fa fa-file-text"></i>
                                        <span class="menu-text">文章模块</span>
                                        <i class="menu-expand"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="{:url('Cate/lst')}">
                                                <span class="menu-text">文章分类</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{:url('Article/lst')}">
                                                <span class="menu-text">文章管理</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                    </ul>                            
                                </li>
                                <li>
                                    <a href="#" class="menu-dropdown">
                                        <i class="menu-icon fa fa-location-arrow"></i>
                                        <span class="menu-text">导航管理</span>
                                        <i class="menu-expand"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="{:url('Nav/lst')}">
                                                <span class="menu-text">导航列表</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{:url('Nav/add')}">
                                                <span class="menu-text">添加导航</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                    </ul>                            
                                </li>
                                <li>
                                    <a href="#" class="menu-dropdown">
                                        <i class="menu-icon fa fa-picture-o"></i>
                                        <span class="menu-text">图片管理</span>
                                        <i class="menu-expand"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="{:url('Article/imglist')}">
                                                <span class="menu-text">图片列表</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{:url('AlternateImg/lst')}">
                                                <span class="menu-text">轮播图列表</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                    </ul>                            
                                </li>
                                <li>
                                    <a href="#" class="menu-dropdown">
                                        <i class="menu-icon fa  fa-gear"></i>
                                        <span class="menu-text">系统设置</span>
                                        <i class="menu-expand"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="{:url('Conf/conflist')}">
                                                <span class="menu-text">配置项</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{:url('Conf/lst')}">
                                                <span class="menu-text">配置管理</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="menu-text">支付方式设置</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                    </ul>                            
                                </li>
                                <li>
                                    <a href="#" class="menu-dropdown">
                                        <i class="menu-icon fa fa-link"></i>
                                        <span class="menu-text">友情链接</span>
                                        <i class="menu-expand"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="{:url('Link/lst')}">
                                                <span class="menu-text">链接列表</span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li>
                                    </ul>                            
                                </li>
                            </ul>
                            @show
                            <!-- /Sidebar Menu -->
                        </div>

            <!-- /Page Sidebar -->
            <!-- Page Content -->
            <div class="page-content">
            @section('content')
                @show
                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
        </div>  
    </div>

    
    


</body></html>