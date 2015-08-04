<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>
<body>
        <img src="{{ asset('/images/photo.jpg') }}" class="center-block img-responsive">

                <h1>Module : Projet de fin d'étude : Semestre 6</h1>

                <div style="
                            margin-left: auto;
                            margin-right: auto;
                            width: 70%;
                            background-color: #ffffff;">

                        <table class="table table-bordered" border="1">
                        <thead>
                        <tr>
                            <th data-field="photo">Photo</th>
                            <th data-field="id">Nom</th>
                            <th data-field="name">Code</th>
                            <th data-field="price">Email</th>
                            <th data-field="price">Signature</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr id="tr-id-1" class="tr-class-1">
                            <td><img src="{{ asset('/users_photos/photo_'.$cin1.'.jpg')}}" height="100" width="100" alt="Ma photo"/></td>
                            <td>{{ $nom1 }}</td>
                            <td>{{ $code1 }}</td>
                            <td>{{ $email1 }}</td>
                            <td>{{ '' }}</td>
                        </tr>
                        <tr id="tr-id-2" class="tr-class-2" >
                            <td><img src="{{ asset('/users_photos/photo_'.$cin2.'.jpg')}}" height="100" width="100" alt="Ma photo"/></td>
                            <td>{{ $nom2 }}</td>
                            <td>{{ $code2 }}</td>
                            <td>{{ $email2 }}</td>
                            <td>{{ '' }}</td>
                        </tr>
                        </tbody>

                    </table>
                </div>
                <table border="1px">
                    <tr>
                <h3>  Professeur Encadrant ............................... </h3>
                    </tr>
                </table>
</body>
</html>