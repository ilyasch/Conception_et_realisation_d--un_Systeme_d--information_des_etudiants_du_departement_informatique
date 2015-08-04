@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
        <img src="{{ asset('/images/photo.jpg') }}" class="center-block img-responsive">
        <div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
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

					<form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/auth/register') }}">
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
							<label class="col-md-4 control-label">Mot de Passe</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirmer Mot de Passe</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Votre Photo de profile(JPEG)</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="photo">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Fichier image</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="fichier">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Téléphone</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tel" value="{{ old('phone') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Carte d'identité nationale</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="cin" value="{{ old('cin') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Code </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="code" value="{{ old('code') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Groupe</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="group" value="{{ old('group') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Date de Naissance</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="ddn" value="{{ old('ddn') }}">
                            </div>
                        </div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Valider
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
