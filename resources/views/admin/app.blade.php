

@include('head');


</head>
<!-- end::Head -->
<!-- begin::Body -->
<body  class="m-page--fluid m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >	
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
<!-- begin::Header -->
<header id="m_header" class="m-grid__item m-header "  m-minimize="minimize" m-minimize-mobile="minimize" m-minimize-offset="10" m-minimize-mobile-offset="10" >
<div class="m-header__top">
<div class="m-container m-container--fluid m-container--full-height m-page__container">
<div class="m-stack m-stack--ver m-stack--desktop">
<!-- begin::Brand -->
<div class="m-stack__item m-brand m-stack__item--left">
<div class="m-stack m-stack--ver m-stack--general m-stack--inline">
<div class="m-stack__item m-stack__item--middle m-brand__logo"> <a href="{{route('dash.camp')}}" class="m-brand__logo-wrapper"> <img alt="" 
	src="{{asset('demo/demo10/media/img/logo/logo.png')}}" class="m-brand__logo-desktop"/> <img alt=""
	 src="{{asset('demo/demo10/media/img/logo/logo_mini.png')}}" class="m-brand__logo-mobile"/> </a> </div>
<div class="m-stack__item m-stack__item--middle m-brand__tools">
<!-- begin::Quick Actions-->

<!-- end::Quick Actions-->
<!-- begin::Responsive Header Menu Toggler-->
<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block"> <span></span> </a>
<!-- end::Responsive Header Menu Toggler-->
<!-- begin::Topbar Toggler-->
<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block"> <i class="flaticon-more"></i> </a>
<!--end::Topbar Toggler-->
</div>
</div>
</div>
<!-- end::Brand -->
<!-- begin::Topbar -->
@include('admin/toolbar')
<!-- end::Topbar -->
</div>
</div>
</div>
<div class="m-header__bottom">
<div class="m-container m-container--fluid m-container--full-height m-page__container">
<div class="m-stack m-stack--ver m-stack--desktop">


<!-- begin::Horizontal Menu -->


<div class="m-stack__item m-stack__item--fluid m-header-menu-wrapper">
<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light "  >
<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
<li class="m-menu__item @yield('dashboard') m-menu__item--submenu m-menu__item--tabs"  m-menu-submenu-toggle="tab" aria-haspopup="true"><a  href="{{route('dash.camp')}}" class="m-menu__link " title="Non functional dummy link"><span class="m-menu__link-text">Dashboard</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left m-menu__submenu--tabs"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
<ul class="m-menu__subnav">
<li class="m-menu__item @yield('dashboard_camp') "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="{{route('dash.camp')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-dashboard"></i><span class="m-menu__link-text">Campaigns Dashboard</span></a></li>

<li class="m-menu__item @yield('dashboard_lead')"  aria-haspopup="true"><a  href="{{route('dash.lead')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-profile-1"></i><span class="m-menu__link-text">Leads Dashboard</span></a></li>


<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel m-menu__item--more m-menu__item--submenu-tabs m-menu__item--icon-only"  m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true"><a  href="javascript:;" class="m-menu__link m-menu__toggle" title="Non functional dummy link"><i class="m-menu__link-icon flaticon-more-v3"></i><span class="m-menu__link-text"></span></a>
<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left m-menu__submenu--pull"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
<ul class="m-menu__subnav">
<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="inner2.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-business"></i><span class="m-menu__link-text">eCommerce</span></a></li>
<li class="m-menu__item  m-menu__item--submenu"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true"><a  href="crud/datatable_v1.html" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-computer"></i><span class="m-menu__link-text">Audience</span><i class="m-menu__hor-arrow la la-angle-right"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right"><span class="m-menu__arrow "></span>
<ul class="m-menu__subnav">
<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="inner2.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-users"></i><span class="m-menu__link-text">Active Users</span></a></li>
<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="inner2.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-interface-1"></i><span class="m-menu__link-text">User Explorer</span></a></li>
<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="inner2.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-lifebuoy"></i><span class="m-menu__link-text">Users Flows</span></a></li>
<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="inner2.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-graphic-1"></i><span class="m-menu__link-text">Market Segments</span></a></li>
<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="inner2.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-graphic"></i><span class="m-menu__link-text">User Reports</span></a></li>
</ul>
</div>
</li>
<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="inner2.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-map"></i><span class="m-menu__link-text">Marketing</span></a></li>
<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="inner2.html" class="m-menu__link "><i class="flaticon-paper-plane"></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Campaigns</span> <span class="m-menu__link-badge"><span class="m-badge m-badge--success">3</span></span> </span></span></a></li>
<li class="m-menu__item  m-menu__item--submenu"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true"><a  href="javascript:;" class="m-menu__link m-menu__toggle" title="Non functional dummy link"><i class="m-menu__link-icon flaticon-infinity"></i><span class="m-menu__link-text">Cloud Manager</span><i class="m-menu__hor-arrow la la-angle-right"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left"><span class="m-menu__arrow "></span>
<ul class="m-menu__subnav">
<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="inner2.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-add"></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">File Upload</span> <span class="m-menu__link-badge"><span class="m-badge m-badge--danger">3</span></span> </span></span></a></li>
<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="inner2.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-signs-1"></i><span class="m-menu__link-text">File Attributes</span></a></li>
<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="inner2.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-folder"></i><span class="m-menu__link-text">Folders</span></a></li>
<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="inner2.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-cogwheel-2"></i><span class="m-menu__link-text">System Settings</span></a></li>
</ul>
</div>
</li>
</ul>
</div>
</li>





</ul>
</div>
</li>




<li class="m-menu__item  @yield('campaign') m-menu__item--submenu m-menu__item--tabs" m-menu-submenu-toggle="tab" aria-haspopup="true"><a  href="{{route('all.camp')}}" class="m-menu__link " title="Non functional dummy link"><span class="m-menu__link-text">Campaigns</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left m-menu__submenu--tabs"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
<ul class="m-menu__subnav">
<li class="m-menu__item @yield('campaign_all') "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="{{route('all.camp')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-signs"></i><span class="m-menu__link-text">All</span></a></li>
<li class="m-menu__item @yield('campaign_create') "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="{{route('create.camp')}}" class="m-menu__link "><i class="flaticon-paper-plane"></i><span class="m-menu__link-text">Create Campaign </span></a></li>
<li class="m-menu__item @yield('campaign_sche')"  m-menu-link-redirect="1" aria-haspopup="true"><a  href="{{route('sche.camp')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-calendar-with-a-clock-time-tools"></i><span class="m-menu__link-text">Scheduled</span></a></li>
<li class="m-menu__item @yield('campaign_completed') "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="{{route('completed.camp')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-interface-7"></i><span class="m-menu__link-text">Completed</span></a></li>

</ul>
</div>
</li>


<li class="m-menu__item   @yield('lead')  m-menu__item--submenu m-menu__item--tabs"  m-menu-submenu-toggle="tab" aria-haspopup="true"><a  href="{{route('lead.all')}}" class="m-menu__link " title="Non functional dummy link"><span class="m-menu__link-text">Leads</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left m-menu__submenu--tabs"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
<ul class="m-menu__subnav">
<li class="m-menu__item  @yield('lead_all')"  m-menu-link-redirect="1" aria-haspopup="true"><a  href="{{route('lead.all')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-users"></i><span class="m-menu__link-text">All</span></a></li>
<li class="m-menu__item  @yield('lead_add')"  m-menu-link-redirect="1" aria-haspopup="true"><a  href="{{route('lead.add')}}" class="m-menu__link " ><i class="flaticon-user-add"></i><span class="m-menu__link-text">Add</span></a></li>
<li class="m-menu__item   @yield('lead_dnc')"  aria-haspopup="true"><a  href="{{route('lead.dnc')}}" class="m-menu__link " ><i class="m-menu__link-icon flaticon-circle"></i><span class="m-menu__link-text">DNC</span></a></li>
<li class="m-menu__item   @yield('lead_sold')"  aria-haspopup="true"><a  href="{{route('lead.sold')}}" class="m-menu__link " ><i class="m-menu__link-icon fas fa-dollar-sign"></i><span class="m-menu__link-text">Sold</span></a></li>

<li class="m-menu__item  @yield('lead_import')"  m-menu-link-redirect="1" aria-haspopup="true"><a  href="{{route('upload.view')}}" class="m-menu__link " ><i class="m-menu__link-icon flaticon-upload-1"></i><span class="m-menu__link-text">Import</span></a></li>



<li class="m-menu__item  m-menu__item--actions"  aria-haspopup="true">
<div class="m-menu__link m-menu__link--toggle-skip">

</div>
</li>
</ul>
</div>
</li>



<li class="m-menu__item @yield('template') m-menu__item--submenu m-menu__item--tabs"  m-menu-submenu-toggle="tab" aria-haspopup="true"><a  href="{{route('template.sms')}}" class="m-menu__link " title="Non functional dummy link"><span class="m-menu__link-text">Templates</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left m-menu__submenu--tabs"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
<ul class="m-menu__subnav">
<li class="m-menu__item @yield('template_sms')"  m-menu-link-redirect="1" aria-haspopup="true"><a  href="{{route('template.sms')}}" class="m-menu__link "><i class="flaticon-comment"></i><span class="m-menu__link-text">SMS</span></a></li>
<li class="m-menu__item @yield('template_email') "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="{{route('template.email')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-email"></i><span class="m-menu__link-text">E-Mail</span></a></li>
<li class="m-menu__item @yield('template_voicemail')"  m-menu-link-redirect="1" aria-haspopup="true"><a  href="{{route('template.voicemail')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-music"></i><span class="m-menu__link-text">Ringless Voicemail</span></a></li>
<li class="m-menu__item @yield('add_template')"  m-menu-link-redirect="1" aria-haspopup="true"><a  href="{{route('add.template')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-music"></i><span class="m-menu__link-text">Add Template</span></a></li>

</ul>
</div>
</li>
<li class="m-menu__item @yield('setting')  m-menu__item--submenu m-menu__item--tabs"  m-menu-submenu-toggle="tab" aria-haspopup="true"><a  href="{{route('setting.sms')}}" class="m-menu__link " title="Non functional dummy link"><span class="m-menu__link-text">Settings</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left m-menu__submenu--tabs"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
<ul class="m-menu__subnav">
<li class="m-menu__item @yield('setting_sms') "  m-menu-link-redirect="1" aria-haspopup="true"><a  href=" {{route('setting.sms')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-comment"></i><span class="m-menu__link-text">SMS Settings</span></a></li>
<li class="m-menu__item @yield('setting_email') "  m-menu-link-redirect="1" aria-haspopup="true"><a  href=" {{route('setting.email')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-email"></i><span class="m-menu__link-text">E-mail Settings</span></a></li>
<li class="m-menu__item @yield('setting_voicemail')"  m-menu-link-redirect="1" aria-haspopup="true"><a  href=" {{route('setting.voicemail')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-music"></i><span class="m-menu__link-text">Ringless Voicemail Settings</span></a></li>

</ul>
</div>
</li>
<li class="m-menu__item   @yield('account') m-menu__item--submenu m-menu__item--tabs"  m-menu-submenu-toggle="tab" aria-haspopup="true"><a  href="{{route('accounts.profile')}}" class="m-menu__link " title="Non functional dummy link"><span class="m-menu__link-text">Account </span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left m-menu__submenu--tabs"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
<ul class="m-menu__subnav">
<li class="m-menu__item  @yield('account_profile') "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="{{route('accounts.profile')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-profile"></i><span class="m-menu__link-text">Profile
</span></a></li>
<li class="m-menu__item @yield('account_subscription') "  aria-haspopup="true"><a  href="{{route('accounts.subscription')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-piggy-bank"></i><span class="m-menu__link-text">Subscription</span></a></span></a></li>


</ul>
</div>
</li>


<!-- admin -->

<li class="m-menu__item  @yield('admin') m-menu__item--submenu m-menu__item--tabs"  m-menu-submenu-toggle="tab" aria-haspopup="true"><a  href="{{route('admin.camp')}}" class="m-menu__link " title="Non functional dummy link"><span class="m-menu__link-text">Admin</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left m-menu__submenu--tabs"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
<ul class="m-menu__subnav">
<li class="m-menu__item  @yield('admin_camp') "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="{{route('admin.camp')}}" class="m-menu__link "><i class="flaticon-paper-plane"></i><span class="m-menu__link-text">Campaigns </span></a></li>

<li class="m-menu__item @yield('admin_cus') "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="{{route('customers')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-signs"></i><span class="m-menu__link-text">Customers</span></a></li>
</ul>
</div>
</li>





<!-- admin end -->





</ul>
</div>
</div>
<!-- end::Horizontal Menu -->




</div>
</div>
</div>
</header>
<!-- end::Header -->
<!-- begin::Body -->


@section('inner')
@show





<!-- end::Body -->
<!-- begin::Footer -->


@include('footer')

