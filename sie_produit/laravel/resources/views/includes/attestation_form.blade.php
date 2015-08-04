@extends('home')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <img src="{{ asset('/images/photo.jpg') }}" class="center-block img-responsive">
            <div class="col-md-8 col-md-offset-2" style="padding-top: 40px">
                <div class="panel panel-default">
                    <div class="panel-heading">Demande d'une Attestation ou Relevé du note au sein de l'Administration</div>
                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Problèmes lièes à vos données entrées.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('services') }}" >
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Nom et Prenom</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Adresse E-Mail</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Confirmer votre code étudiant</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="code" value="{{ old('code') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Filière</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="filiere" value="{{ old('filiere') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Date limite </label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="dl" value="{{ old('dl') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Type de la demande</label>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" class="form-control" name="type" value="1">
                                            Pour une demande d'attestation universitaire
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" class="form-control" name="type" value="2">
                                            Pour une demande de rélevé de notes générale
                                        </label>
                                     </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" class="form-control" name="type" value="3">
                                            Pour une demande de rélevé de notes et attestation universitaire
                                        </label>
                                    </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Valider la demande
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
