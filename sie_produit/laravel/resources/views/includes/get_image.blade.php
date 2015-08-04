@extends('home')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="padding-top: 40px">
                <div class="panel panel-default">
                    <div class="panel-heading">Demande d'une Attestation ou Relevé du note au sein de l'Administration</div>
                    <div class="panel-body">
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
                                <form role="form" method="POST" action="{{ route('images') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="InputName">Son email</label>
                                            <div class="input-group">
                                                <input type="email" class="form-control" name="email" id="InputName" placeholder="Son email" required>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                            </div>
                                        </div>
                                        <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
                                    </div>
                                </form>
                        @if(isset($path))
                            <img src="{{ asset($path) }}" class="center-block img-responsive">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection