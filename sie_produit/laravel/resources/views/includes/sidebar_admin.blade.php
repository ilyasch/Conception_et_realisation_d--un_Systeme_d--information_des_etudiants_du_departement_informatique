
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- search form
        <form action="{{url('/rechercher')}}" method="post" class="sidebar-form">
            <div class="input-group">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" name="rechercher" class="form-control" placeholder="Rechercher"/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>-->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <li>
                <a href="{{url('/upload')}}">
                    <i class="fa fa-angle-left"></i> <span>Uploader des fichiers</span>
                </a>
            </li>
            <li>
                <a href="{{url('/image')}}">
                    <i class="fa fa-angle-left"></i> <span>Rechercher par email</span>
                </a>
            </li>

            <li>
                <a href="{{url('services_adm')}}">
                    <i class="fa fa-angle-left"></i> <span>Services</span>
                    <!--     <small class="label pull-right bg-green">à Activer</small> -->
                </a>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>