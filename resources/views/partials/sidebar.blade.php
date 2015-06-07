<!-- left side start-->
<div class="left-side sticky-left-side">

    <!--logo and iconic logo start-->
    <div class="logo">
        <a><img src="{{ asset('images/logo.png')  }}" alt=""></a>
    </div>

    <div class="logo-icon text-center">
        <a><img src="{{ asset('images/logo_icon.png')  }}" alt=""></a>
    </div>
    <!--logo and iconic logo end-->

    <div class="left-side-inner">

        <!-- visible to small devices only -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">
            <div class="media logged-user">
                <img alt="" src="{{ asset('images/photos/user-avatar.png')  }}" class="media-object">
                <div class="media-body">
                    <h4><a href="#">John Doe</a></h4>
                    <span>"Hello There..."</span>
                </div>
            </div>

            <h5 class="left-nav-title">Account Information</h5>
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li><a href="#"><i class="fa fa-user"></i> <span>{{ trans('ui.header_top.profile') }}</span></a></li>
                <li><a href="#"><i class="fa fa-cog"></i> <span>{{ trans('ui.header_top.settings') }}</span></a></li>
                <li><a href="#"><i class="fa fa-sign-out"></i> <span>{{ trans('ui.header_top.logout') }}</span></a></li>
            </ul>
        </div>

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked custom-nav">
            <li class="active"><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('ui.sidebar.dashboard') }}</span></a></li>
            <li class="menu-list"><a href=""><i class="fa fa-truck"></i> <span>{{ trans('ui.sidebar.label_car') }}</span></a>
                <ul class="sub-menu-list">
                    <li><a href="{{ url('car') }}"> {{ trans('ui.sidebar.cars') }}</a></li>
                    <li><a href="{{ url('car/color') }}"> {{ trans('ui.sidebar.colors') }}</a></li>
                    <li><a href="{{ url('car/brand') }}"> {{ trans('ui.sidebar.brands') }}</a></li>
                    <li><a href="{{ url('car/model') }}"> {{ trans('ui.sidebar.prototypes') }}</a></li>
                    <li><a href="{{ url('car/condition') }}"> {{ trans('ui.sidebar.conditions') }}</a></li>

                </ul>
            </li>

            <li><a href="{{ url('client') }}"><i class="fa fa-users"></i> <span>{{ trans('ui.sidebar.clients') }}</span></a></li>
            <li><a href="{{ url('client/country') }}"><i class="fa fa-globe"></i> <span>{{ trans('ui.sidebar.countries') }}</span></a></li>
            <li><a href="{{ url('agreement') }}"><i class="fa fa-pencil-square-o"></i> <span>{{ trans('ui.sidebar.agreements') }}</span></a></li>
            <li><a href="{{ url('agreement/status') }}"><i class="fa fa-file-text-o"></i> <span>{{ trans('ui.sidebar.status') }}</span></a></li>

        </ul>
        <!--sidebar nav end-->

    </div>
</div>