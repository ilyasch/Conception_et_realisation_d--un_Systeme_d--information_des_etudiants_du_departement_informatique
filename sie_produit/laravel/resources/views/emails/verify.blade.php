<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Verification d'adresse email</h2>

<div>
    Bienvenue à notre site web autant qu'étudiant.
    Pour valider votre incription veuillez clicker sur le lien suivant :
    {{ URL::to('register/verify/' . $confirmation_code) }}<br/>

</div>

</body>
</html>