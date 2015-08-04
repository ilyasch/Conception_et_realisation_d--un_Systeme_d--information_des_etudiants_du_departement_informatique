@extends('home')
@section('content')
    <div class="container-fluid">
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
                        @foreach($semPcour as $semestre => $tab)
                            <ul>
                                <li>
                                    {{ $semestre }}
                                    @foreach($tab as $module => $etat)
                                        <h5>
                                            {{ $module .' est '. $etat}}
                                            <small class="label label-waring pull-right"> 67 %</small>
                                        </h5>
                                        <div class="progress progress-xxs">
                                            <div class="progress-bar progress-bar-success" style="width: 50%"></div>
                                        </div>
                                    @endforeach
                                </li>
                            </ul>
                        @endforeach

                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>
        </div>
@endsection
