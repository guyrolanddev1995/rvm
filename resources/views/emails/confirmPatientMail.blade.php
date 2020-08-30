<html>
  <head>
    <title>RVM Confirmation de compte</title>
  </head>
  <body>
    <h2>Confirmation de votre compte</h2>
    <br/>
     Votre addresse E-mail est {{$data['email']}} , Cliquer sur le lien ci-dessous pour validater votre compte
    <br/>
    <a href="{{url('patient/confirmEmail', $data->confirmemail->token)}}">Verifier mon compte</a>
  </body>
</html>