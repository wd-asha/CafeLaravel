<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-dashboard.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/starlight.css') }}">
    <link href="{{ asset('css/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('css/starlight.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/medium-editor/medium-editor.css') }}" rel="stylesheet">
</head>

<body>

<!-- ########## START: LEFT PANEL ########## -->
<div class="sl-logo"><a href="{{ URL('/') }}">Cafe</a></div>
<div class="sl-sideleft">

    <div class="sl-sideleft-menu">

        <a href="{{ route('admin.index') }}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i></i>
                <span class="menu-item-label">Админ панель</span>
            </div>
        </a>

        <a href="{{ route('admin.index') }}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-user-circle-o tx-20"></i>
                <span class="menu-item-label">Пользователи</span>
            </div>
        </a>

        <a href="{{ route('admin.categories') }}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-tags tx-20"></i>
                <span class="menu-item-label">Категории</span>
            </div>
        </a>

        <a href="{{--{{ route('admin.subscribers') }}--}}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-user-circle-o tx-20"></i>
                <span class="menu-item-label">Подписчики</span>
            </div>
        </a>

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-table tx-20"></i>
                <span class="menu-item-label">Столики</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.tables') }}" class="nav-link">Все столики</a></li>
            <li class="nav-item"><a href="{{ route('table.create') }}" class="nav-link">Новый столик</a></li>
        </ul>

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-clock-o tx-20"></i>
                <span class="menu-item-label">Рабочее время</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.hours') }}" class="nav-link">Все времена</a></li>
            <li class="nav-item"><a href="{{ route('hour.create') }}" class="nav-link">Новое время</a></li>
        </ul>

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-coffee tx-20"></i>
                <span class="menu-item-label">Блюда</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.dishes') }}" class="nav-link">Все блюда</a></li>
            <li class="nav-item"><a href="{{ route('dish.create') }}" class="nav-link">Новое блюдо</a></li>
        </ul>

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-calculator tx-20"></i>
                <span class="menu-item-label">Заказы</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.neworders') }}" class="nav-link">Новые</a></li>
            <li class="nav-item"><a href="{{ route('admin.orders.process') }}" class="nav-link">В работе</a></li>
            <li class="nav-item"><a href="{{ route('admin.orders.delivered') }}" class="nav-link">На доставке</a></li>
            <li class="nav-item"><a href="{{ route('admin.orders.canceled') }}" class="nav-link">Завершены</a></li>
        </ul>

        <a href="{{ route('admin.places') }}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-ticket tx-20"></i>
                <span class="menu-item-label">Места</span>
            </div>
        </a>

    </div><!-- sl-sideleft-menu -->

    <br>
</div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<div class="sl-header">
    <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
    </div><!-- sl-header-left -->
    <div class="sl-header-right">
        <nav class="nav">
            <div class="dropdown">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <span class="logged-name">{{ Auth::user()->name }}</span>
                    <img src="../img/img3.jpg" class="wd-32 rounded-circle" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <li><a href=""><i class="icon ion-ios-person-outline"></i> Профиль</a></li>
                        <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                        <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
                        <li><a href=""><i class="icon ion-ios-star-outline"></i> Избранное</a></li>
                        <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                <i class="icon ion-power"></i>Выход
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
            <a id="btnRightMenu" href="" class="pos-relative">
                <i class="icon ion-ios-bell-outline"></i>
                <!-- start: if statement -->
                <span class="square-8 bg-danger"></span>
                <!-- end: if statement -->
            </a>
        </div><!-- navicon-right -->
    </div><!-- sl-header-right -->
</div><!-- sl-header -->
<!-- ########## END: HEAD PANEL ########## -->

<!-- ########## START: RIGHT PANEL ########## -->
<div class="sl-sideright">
    <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Сообщения (2)</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
        </li>
    </ul><!-- sidebar-tabs -->

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
            <div class="media-list">
                <!-- loop starts here -->
                <a href="" class="media-list-link">
                    <div class="media">
                        <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
                        <div class="media-body">
                            <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                            <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                            <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                        </div>
                    </div><!-- media -->
                </a>
                <!-- loop ends here -->
                <a href="" class="media-list-link">
                    <div class="media">
                        <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
                        <div class="media-body">
                            <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                            <span class="d-block tx-11 tx-gray-500">Jan 23, 2:32am</span>
                            <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                        </div>
                    </div><!-- media -->
                </a>
            </div><!-- media-list -->
            <div class="pd-15">
                <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
            </div>
        </div><!-- #messages -->

        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
            <div class="media-list">
                <!-- loop starts here -->
                <a href="" class="media-list-link read">
                    <div class="media pd-x-20 pd-y-15">
                        <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
                        <div class="media-body">
                            <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                            <span class="tx-12">October 03, 2017 8:45am</span>
                        </div>
                    </div><!-- media -->
                </a>
                <!-- loop ends here -->
                <a href="" class="media-list-link read">
                    <div class="media pd-x-20 pd-y-15">
                        <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
                        <div class="media-body">
                            <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                            <span class="tx-12">October 02, 2017 12:44am</span>
                        </div>
                    </div><!-- media -->
                </a>
            </div><!-- media-list -->
        </div><!-- #notifications -->

    </div><!-- tab-content -->
</div><!-- sl-sideright -->
<!-- ########## END: RIGHT PANEL ########## --->

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    @yield('content')
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<script src="{{ asset('lib/jquery/jquery.js') }}"></script>
<script src="{{ asset('lib/popper.js/popper.js') }}"></script>
<script src="{{ asset('lib/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>

<script src="{{ asset('js/starlight.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>

<script src="{{ asset('js/sweetalert.min.js')}}"></script>
<script src="{{ asset('js/toastr.min.js')}}"></script>


<script src="{{ asset('lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('lib/d3/d3.js') }}"></script>
<script src="{{ asset('lib/rickshaw/rickshaw.min.js') }}"></script>
<script src="{{ asset('lib/chart.js/Chart.js') }}"></script>
<script src="{{ asset('lib/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('lib/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('lib/Flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('lib/flot-spline/jquery.flot.spline.js') }}"></script>
<script src="{{ asset('lib/medium-editor/medium-editor.js') }}"></script>
<script src="{{ asset('js/material-dashboard.min.js') }}"></script>
<script src="{{ asset('lib/summernote/summernote-bs4.min.js') }}"></script>


<script>
    $(function(){
        'use strict';

        // Inline editor
        let editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote').summernote({
            height: 150,
            tooltip: false
        })
    });
</script>
<script>
    $(function(){
        'use strict';

        // Inline editor
        let editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote1').summernote({
            height: 150,
            tooltip: false
        });
        $('#summernote2').summernote({
            height: 150,
            tooltip: false
        });
        $('#summernote3').summernote({
            height: 150,
            tooltip: false
        });
        $('#summernote4').summernote({
            height: 150,
            tooltip: false
        });
    });
</script>
<script>
    @if(Session::has('message'))
    let type="{{Session::get('alert-type','info')}}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
<script>
    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        let link = $(this).attr("href");
        swal({
            title: "Действительно хотите удалить?",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal("Операция отменена :)");
                }
            });
    });
</script>

<script>
    $(function(){

        'use strict';

        $('.select2').select2({
            minimumResultsForSearch: Infinity
        });

        // Select2 by showing the search
        $('.select2-show-search').select2({
            minimumResultsForSearch: ''
        });

        // Select2 with tagging support
        $('.select2-tag').select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });

        // Datepicker
        $('.fc-datepicker').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true
        });

        $('#datepickerNoOfMonths').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            numberOfMonths: 2
        });

        // Color picker
        $('#colorpicker').spectrum({
            color: '#17A2B8'
        });

        $('#showAlpha').spectrum({
            color: 'rgba(23,162,184,0.5)',
            showAlpha: true
        });

        $('#showPaletteOnly').spectrum({
            showPaletteOnly: true,
            showPalette:true,
            color: '#DC3545',
            palette: [
                ['#1D2939', '#fff', '#0866C6','#23BF08', '#F49917'],
                ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
            ]
        });

    });
</script>

</body>
</html>
