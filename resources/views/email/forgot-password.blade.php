<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email de réinitialisation du mot de passe</title>
</head>
<body>
    <h1>Bonjour {{ $mailData['user']->name }}</h1>
    
    <p>Cliquez ci-dessous pour changer votre mot de passe.</p>

    <a href="{{ route('account.resetPassword', $mailData['token']) }}">Cliquez ici</a>

    <p>Merci</p>

</body>
</html>
