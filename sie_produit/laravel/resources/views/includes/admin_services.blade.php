
    <div class="container-fluid">
        <div class="row">
            <img src="{{ asset('/images/photo.jpg') }}" class="center-block img-responsive">
            <div class="col-md-8 col-md-offset-2" style="padding-top: 40px">
                <div class="panel panel-default">
                    <div class="panel-heading">Les étudiants qui ont une demandes </div>
                    <div class="panel-body">
<form>
                        <table class="table table-bordered" border="1px">
                            <tr>

                                <th>etudiants</th>
                                <th>demandes</th>
                                <th>date</th>
                            </tr>

                            @foreach($user as $userr)
                            <tr>
                                <td >{{$userr->name}}</td>
                                <td><a href="{{url('/Emploi/l2a01')}}">{{$userr->type_demande}}</a></td>
                                <td >{{$userr->date_limite}}</td>
                            </tr>
                                @endforeach

                        </table>

</form>

                    </div>
                </div>
            </div>
        </div>
    </div>

