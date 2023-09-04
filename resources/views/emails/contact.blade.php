<!DOCTYPE html>
<html>
<head>
    <title>Nouveau message de contact</title>
</head>
<body>
    <h2>Nouveau message de contact</h2>
    <p>Nom: {{ $request->name }}</p>
    <p>Email: {{ $request->email }}</p>
    <p>Message:</p>
    <p>{{ $request->message }}</p>
</body>
</html>
