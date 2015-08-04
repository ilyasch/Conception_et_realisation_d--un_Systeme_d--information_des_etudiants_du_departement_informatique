
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
        $(function() {
            $("#datepicker").datepicker($.datepicker.regional["fr"]);
        });
    </script>
</head>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="a">
                <a href="{{url('/')}}">
                    <i class="fa fa-dashboard"></i> <span>Tableau de board</span>
                </a>
            </li>
            <li>
                <a href="{{url('/admin/affecter')}}">
                    <i class="fa fa-angle-left"></i> <span>Affectation PFE</span>
                    <small class="label pull-right bg-aqua">S6</small>
                </a>
            </li>

            <li style="padding-top: 10px">
                Date: <div style="background-color: #ffffff" id="datepicker"></div>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>