@extends('home')
@section('content')
    <div class="container-fluid">
        <div class="row">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Problèmes lièes à vos données entrées.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                            <h1> La listes des fichiers à Télécharger : </h1>
                                @foreach($entries as $entry)
                                <div class="col-md-4">
                                <a href="{{asset($entry->path)}}">
                                    <div class="info-box bg-gray">
                                        <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Télécharger</span>
                                            <span class="info-box-number">{{ $entry->name }}</span>
                                        </div><!-- /.info-box-content -->
                                    </div>
                                 </a>
                                </div>
                                @endforeach

        </div>
    </div>
@endsection
