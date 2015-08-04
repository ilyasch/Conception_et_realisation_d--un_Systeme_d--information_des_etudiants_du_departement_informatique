@extends('admin_pfe')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Table des étudiants PFE</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('affectation')}}" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type=hidden name="nombre" value="{{$nmb}}">

                    <table class="table table-hover">
                        <tbody><tr>
                            <th>ID</th>
                            <th>Etudiant 1</th>
                            <th>Etudiant 2</th>
                            <th>Année</th>
                            <th>Etat</th>
                            <th>Encadrant</th>
                        </tr>

                        <?php $i = 0 ?>
                        @foreach($tab as $id => $n2)
                            {{ $i++ }}
                        <tr>
                                <td>
                                    {{$id}}
                                    <input type=hidden name="{{'id'.$i}}" value="{{$id}}">
                                </td>
                                <td>
                                    {{$n2[0]}}
                                    <input type=hidden name="{{'nom1'.$i}}" value="{{$n2[0]}}">
                                </td>
                                <td>
                                    {{$n2[1]}}
                                    <input type=hidden name="{{'nom2'.$i}}" value="{{$n2[1]}}">
                                </td>
                                <td>{{ date("Y") }}</td>
                                <td><span class="label label-success">Approuvé</span></td>
                                <td>
                                        <div class="col-md-6">
                                            <input type=text name="{{'ens'.$i}}" list=browsers >
                                        </div>
                                        <datalist id=browsers >
                                            @foreach($enss as $ens)
                                            <option value="{{$ens}}" >{{$ens}}
                                            @endforeach
                                        </datalist>
                                </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Valider
                                </button>
                            </div>
                        </div>
                   </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>

@endsection