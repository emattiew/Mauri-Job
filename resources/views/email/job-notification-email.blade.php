<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email de Notification de Poste</title>
</head>
<body>
    <h1>Bonjour {{ $mailData['employer']->name }}</h1>

    @if(isset($mailData['job']))
        <p>Titre du Poste : {{ $mailData['job']->title }}</p>
    @else
        <p>Les informations sur le poste ne sont pas disponibles.</p>
    @endif

    <p>Détails de l'Employé :</p>
    
    <p>Nom : {{ $mailData['user']->name }}</p>
    <p>Email : {{ $mailData['user']->email }}</p>
    <p>Numéro de Mobile : {{ $mailData['user']->mobile }}</p>
    <p>Désignation : {{ $mailData['user']->designation }}</p>
    
    @if(isset($mailData['user']->cv))
    <p><a href="{{ route('download.cv', $mailData['user']->cv) }}">Télécharger CV</a></p>
    @endif
</body>
<style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .content {
            padding: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #333;
        }
        p {
            color: #555;
        }
    </style>
</html>

