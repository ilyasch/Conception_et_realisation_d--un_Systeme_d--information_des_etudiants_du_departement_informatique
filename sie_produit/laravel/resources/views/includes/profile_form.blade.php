@extends('home')
@section('content')

    <h1 style="padding-top: 10px">Voulez vous éditer votre profile {{\Illuminate\Support\Facades\Auth::user()->name}} ?</h1>

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @if(\Illuminate\Support\Facades\Session::has('message'))
        <div class="alert alert-danger">
            {{Session::get('message')}}
        </div>
    @endif
    {!! Form::open(array('route' => 'profile_form', 'method' => 'post', 'class' => 'form', 'style'=>'padding-top: 100px')) !!}
    {!!Form::token()!!}
    <div class="form-group">
        {!! Form::label("Qu'est ce que voulez éditer ? : ") !!}
        {!!
        Form::select('data', array('email' => 'E-mail',
                                  'cin' => "Code d'identité nationale",
                                  'tel' => "Téléphone",
                                  'siga' => "Code étudiant",
                                  'groupe' => "Groupe"
                    ))
        !!}
        {!! Form::text('name', null,
        array('required',
        'class'=>'form-control',
        'placeholder'=>'Entrer ici votre nouvelle donnée')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Votre adresse email') !!}
        {!! Form::text('email', null,
        array(
        'class'=>'form-control',
        'placeholder'=>'Confirmer avec votre adresse email actuelle')) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Valider',
        array('class'=>'btn btn-primary')) !!}
    </div>
    {!! Form::close() !!}
@endsection