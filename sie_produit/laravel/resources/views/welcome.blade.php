@extends('home')
@section('content')

    @if(\Illuminate\Support\Facades\Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif
    @if(\Illuminate\Support\Facades\Session::has('email_modifier'))
        <div class="alert alert-success">
            {{Session::get('email_modifier')}}
        </div>
        @endif
    @if(\Illuminate\Support\Facades\Session::has('error'))
        <div class="alert alert-error">
            {{Session::get('error')}}
        </div>
    @endif
@if(! \Illuminate\Support\Facades\Auth::user()->isAdmin_pfe() AND ! \Illuminate\Support\Facades\Auth::user()->isAdmin_services())
    <!-- Small boxes (Stat box) -->
    <div class="row" style="padding-top: 50px">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Etudiants</span>
                    <span class="info-box-number">{{ $etd }}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-bookmark-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Cours</span>
                    <span class="info-box-number">{{$mod}}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Enseignants</span>
                    <span class="info-box-number">{{$ens}}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Uploads</span>
                    <span class="info-box-number">{{$fich}}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>

        <div class="container-fluid" style="padding-top: 150px">
            <div class="row">
                <div class='col-md-12'>
                    <!-- Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Mes Cours </h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                        @if($semPcour == null)
                                <h5>
                                    Vous n'êtes inscrit à aucun cour
                                    <small class="label label-waring pull-right"></small>
                                </h5>
                        @else
                            @foreach($semPcour as $semestre => $tab)
                                <ul>

                                    {{\App\Module::convertir($semestre)}}

                                        @foreach($tab as $module => $etat)
                                        <li>
                                            <h5>
                                                {{$module}}
                                                {{$opt  = \App\Module::where('name',$module)->firstOrFail()->option}}
                                                <small class="label label-waring pull-right"> {{ 'Etat de validation est : '.$etat }}</small>
                                            </h5>
                                            @if($etat == 0)
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                        <span class="sr-only">100% Complete</span>
                                                    </div>
                                                </div>
                                            @elseif($etat > 0)
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                        <span class="sr-only">40% Complete (success)</span>
                                                    </div>
                                                </div>
                                            @endif

                                        </li>
                                        @endforeach
                                </ul>
                            @endforeach
                        @endif

                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div>
            </div>

    </div><!-- /.row -->
@endif
@endsection
