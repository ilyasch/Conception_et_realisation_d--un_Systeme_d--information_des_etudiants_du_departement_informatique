@extends('home')
@section('content')


    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    <div class="container">
        <div class="row">
            <form role="form" method="POST" action="{{ route('pfe_post') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="InputName">Votre Nom </label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter votre nom" required>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>

                            <input type="text" class="form-control" name="Inputcode" id="InputName" placeholder="Enter votre code" required>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>

                            <input type="email" class="form-control" name="Inputemail" id="Inputemail" placeholder="Enter votre email" required>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="InputEmail">Enter votre binome</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="Inputbinome" placeholder="nom" required>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>

                            <input type="text" class="form-control" name="Inputcodebinome" id="InputName" placeholder="code" required>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>

                            <input type="email" class="form-control" name="Inputemailbinome" id="InputName" placeholder="email" required>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="InputEmail">Remarque</label>
                        <div class="input-group">
                            <p type="email" class="form-control">
                                Veuillez Confirmer la procédure et imprimer la fiche pour la signer.
                            </p>
                        </div>
                    </div>

                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
                </div>
            </form>

        </div>
    </div>


@endsection