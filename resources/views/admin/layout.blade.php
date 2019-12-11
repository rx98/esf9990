
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >




    <link rel="stylesheet" href="{{asset('css/admin.css')}}" />
    @yield('css')
    @yield('selectD&User')


    {{-- <style type="text/css">
        body, table  {

            font-family : lang(en_US)'Segoe UI';
            font-family : lang(fa_IR) 'Vazir';
        }
    </style> --}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    {{--<!--[if lt IE 9]>--}}
    {{--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>--}}
    {{--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
    {{--<![endif]-->--}}

    <!-- Google Font -->
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">--}}
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{asset('')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">پنل</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b> @if(Auth::user()->privilege == 3)پنل کارشناس پاسخگو ۹۹۹۰ @else پنل سوپروایز ۹۹۹۰ @endif</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>


            <!-- Delete This after download -->
            <!-- End Delete-->



            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <li class="">
                        <a href="{{ route('logout') }}" >
                            <span style="font-weight: bold" class="fa fa fa-sign-out">خروج</span>
                        </a>
                    </li>

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset(Auth::user()->image)}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                    </li>


                </ul>
            </div>
        </nav>
    </header>
    <!-- right side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <br class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-right image">
                    <img src="{{asset(Auth::user()->image)}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-right info">
                    <p @if(Auth::user()->privilege == 3)style="color: mintcream" @endif>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
                </div>

            </div>

            @if(Auth::user()->privilege == 3)
            <h4 style="color: yellowgreen">منوی کارشناسان پاسخگو</h4>


            <br>
            <div >
                <ul>
                    <li> <a style="color: white" class="fa fa-send" href="{{asset('admin/sendno')}}"> ارسال نمونه شماره </a> </li>
                </ul>

                <ul>
                    <li> <a style="color: white" style="color: white" class="fa fa-sticky-note" href="{{asset('admin/view_no')}}"> جوابیه نمونه شماره </a> </li>
                </ul>

                <ul>
                    <li> <a style="color: white" class="fa fa-check" href="{{asset('admin/select_date_vacation?user_id=')}}{{Auth::user()->id}}"> ثبت مرخصی استحقاقی </a> </li>
                </ul>

                <ul>
                    <li> <a style="color: white" class="fa fa-check" href="#"> ثبت مرخصی شیفت </a> </li>
                </ul>
            </div>
            @endif
            <!-- search form -->

            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->

            @if(Auth::user()->privilege != null && Auth::user()->privilege != 3)
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">منو</li>
                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>داشبورد</span>

                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{asset('admin/show_users')}}"><i class="fa fa-user-circle"></i>مدیریت کاربران</a></li>
                        @if(Auth::user()->privilege == 1 ||Auth::user()->privilege == 5)
                        <li><a href="{{asset('admin/zoon_group')}}"><i class="fa fa-users"></i> مدیریت گروه‌ها و مراکز</a></li>
                        @endif
                        <li><a href="{{asset('admin/import')}}"><i class="fa fa-file-excel-o"></i> وارد کردن داده از اکسل</a></li>
                        {{-- <li><a href="{{asset('admin/agent_register')}}"><i class="fa fa-sticky-note"></i> ثبت‌نام کارشناس </a></li>
                        <li><a href="{{asset('admin/show_agents')}}"><i class="fa fa-check"></i> انتخاب کارشناس </a></li> --}}
                        {{--<li><a href="admin/get_date"><i class="fa fa-circle-o"></i> تاریخ گزارش </a></li>--}}
                        <ul class="sidebar-menu">
                            <li class="active treeview">
                                <a href="#">
                                    <i class="fa fa-line-chart"></i> <span>اطلاعات کمی</span>

                                </a>
                                <ul class="fa fa-line-chart treeview-menu">
                                    <li><a href="{{asset('admin/view')}}"><i class="fa fa-area-chart"></i>Agent Group Summary Report</a></li>
                                    <li><a href="{{asset('admin/view2')}}"><i class="fa fa-bar-chart"></i>Agent Performance Report</a></li>
                                    <li><a href="{{asset('admin/psm')}}"><i class="fa fa-bar-chart"></i>PSM</a></li>
                                    <li><a href="{{asset('admin/dpsm')}}"><i class="fa fa-bar-chart"></i>Daily PSM (developing)</a></li>
                                </ul>

                            </li>

                        </ul>

                        <ul class="sidebar-menu">
                            <li class="active treeview">
                                <a href="#">
                                    <i class="fa fa-line-chart"></i> <span>اطلاعات کیفی</span>

                                </a>
                                <ul class="fa fa-line-chart treeview-menu">
                                    <li><a href="{{asset('admin/quality_teh')}}"><i class="fa fa-area-chart"></i>کیفی تهران</a></li>
                                    <li><a href="{{asset('admin/quality_reg')}}"><i class="fas fa-file-text"></i> ثبت خطای داخلی </a></li>
                                    <li><a href="{{asset('admin/quality_show')}}"><i class="fa fa-bar-chart"></i>نمایش خطای داخلی</a></li>
                                </ul>

                            </li>

                        </ul>

                        <ul class="sidebar-menu">
                            <li class="active treeview">
                                <a href="#">
                                    <i class=""></i> <span>ارتباط با کارشناس</span>

                                </a>
<!--                                --><?php //dd(Auth::user()->group) ?>

                                {{--<ul class="fa fa-line-chart treeview-menu">--}}
                                    {{--<li> @if(Auth::user()->group == null) <a href="{{asset('admin/send_no')}}">ارسال نمونه شماره </a> @endif</li>--}}
                                {{--</ul>--}}

                                <ul class="fa fa-line-chart treeview-menu">
                                    <li><a href="{{asset('admin/view_no')}}"><i></i>مشاهده نمونه شماره <span class="label pull-left bg-yellow">{{\App\SendNo::count()}}</span></a></li>
                                </ul>

                                <ul class="fa fa-line-chart treeview-menu">
                                    <li><a href="{{asset('admin/view_off')}}"><i></i>مرخصی </a></li>
                                </ul>

                            </li>

                        </ul>


                    </ul>

                </li>

            </ul>
            @endif

            {{--style="display:@if(Auth::user()->group !== null)none @endif"--}}


        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer text-left">

        <div><strong>2019 Ebrahim Assadi &copy;</strong></div>
    </footer>
    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- wrapper -->





</body>
<script src="{{asset('js/admin.js')}}"></script>
@yield('js')

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<script type="text/javascript">
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>

<script type="text/javascript">
    $('#input1').change(function() {
        var $this = $(this),
            value = $this.val();
        alert(value);
    });
    $('#textbox1').change(function () {
        var $this = $(this),
            value = $this.val();
        alert(value);
    });
    $('[data-name="disable-button"]').click(function() {
        $('[data-mddatetimepicker="true"][data-targetselector="#input1"]').MdPersianDateTimePicker('disable', true);
    });
    $('[data-name="enable-button"]').click(function () {
        $('[data-mddatetimepicker="true"][data-targetselector="#input1"]').MdPersianDateTimePicker('disable', false);
    });
</script>


<script>
        $(document).ready(function () {
            $('#tarikh').persianDatepicker({
                altField: '#tarikhAlt',
                altFormat: 'X',
                format: 'D MMMM YYYY HH:mm a',
                observer: true,
                timePicker: {
                    enabled: true
                },
            });
        });
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
          {
            ranges   : {
              'Today'       : [moment(), moment()],
              'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month'  : [moment().startOf('month'), moment().endOf('month')],
              'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate  : moment()
          },
          function (start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
          }
        )

        //Date picker
        $('#datepicker').datepicker({
          autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass   : 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
          showInputs: false
        })
      })
    </script>
</html>
