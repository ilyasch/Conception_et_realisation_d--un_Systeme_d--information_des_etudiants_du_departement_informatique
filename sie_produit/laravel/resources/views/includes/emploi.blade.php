@extends('home')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <img src="{{ asset('/images/photo.jpg') }}" class="center-block img-responsive">
            <div class="col-md-8 col-md-offset-2" style="padding-top: 40px">
                <div class="panel panel-default">
                    <div class="panel-heading">Les emplois du temps : Parcours informatiques</div>
                    <div class="panel-body">

                        <table class="table table-bordered">
                            <tr>
                                <th>Filère</th>
                                <th>Groupe</th>
                            </tr>
                                <tr>
                                    <td rowspan="2">SMI-L2 A</td>
                                    <td><a href="{{url('/Emploi/l2a01')}}">A01</a></td>
                                </tr>
                                <tr>
                                    <td><a href="{{url('/Emploi/l2a02')}}">A02</a></td>
                                </tr>

                                    <tr>
                                        <td rowspan="2">SMI-L2 B</td>
                                        <td><a href="{{url('/Emploi/l2b01')}}">B01</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{url('/Emploi/l2b02')}}">B02</a></td>
                                    </tr>

                                <tr>
                                    <td rowspan="2">SMI-L3 A</td>
                                    <td><a href="{{url('/Emploi/l3a01')}}">A01</a></td>
                                </tr>
                                <tr>
                                        <td><a href="{{url('/Emploi/l3a02')}}">A02</a></td>
                                </tr>
                                    <tr>
                                        <td rowspan="2">SMI-L3 B</td>
                                        <td><a href="{{url('/Emploi/l3b01')}}">B01</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{url('/Emploi/l3b02')}}">B02</a></td>
                                    </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
