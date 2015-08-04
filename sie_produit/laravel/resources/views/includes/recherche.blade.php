@extends('home')
@section('content')
    <div class="container">

                @foreach($res as $name => $path)
                <ul>
                <li>
                    <a href="{{ asset($path['path'])}}">{{$name}}</a>
                </li>
                </ul>
                @endforeach
    </div>
@endsection
