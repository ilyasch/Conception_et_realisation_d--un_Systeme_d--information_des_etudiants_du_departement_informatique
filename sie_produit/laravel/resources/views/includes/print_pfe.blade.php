<html>
<head>
    <style>
        td,tr,th { border: 1px solid black; text-align: center; }
        table {border : 1px solid black ; width:100%}
        .ana {
            width: 50%;
        }
        img {
            padding: 0 100px 0;
        }
    </style>
</head>

<body>

<header>
<img src="{{ asset('/images/photo.jpg') }}">
</header>
<h1>Liste des étudiants inscrits dans le Module : PFE </h1>
<section style=" padding-top: 10px">
                        <table>
                            <tbody><tr>
                                <th >ID</th>
                                <th >Etudiants</th>
                                <th >Année</th>
                                <th >Etat</th>
                                <th >Encadrant</th>
                            </tr>
                            @foreach($res as $id => $values)
                                <tr style="background-color: rgb( {{rand(230,250)}}} , {{rand(200,250)}}} , {{rand(240,250)}}} ) ">
                                    <td >{{$id}}</td>
                                    <td class="ana">
                                        {{'Code : '.$values[3]}}<br>{{' Nom: '.$values[0]/*.' Email :'.$values[5]*/ }}
                                        <hr>
                                        {{'Code : '.$values[4]}}<br>{{' Nom: '.$values[1]/*.' Email :'.$values[6]*/ }}
                                    </td>

                                    <td >{{ date("Y") }}</td>
                                    <td ><span>Approuvé</span></td>
                                    <td >{{$values[2]}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
</section>
</body>
</html>