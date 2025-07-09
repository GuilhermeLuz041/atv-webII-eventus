<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ingresso</title>
    <style>
        body { font-family: sans-serif; }
        .container { padding: 20px; border: 2px dashed #333; }
        h1 { color: #0A2D35; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ingresso para {{ $evento->nome }}</h1>
        <p><strong>Nome do participante:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($evento->data_evento)->format('d/m/Y H:i') }}</p>
        <p><strong>Local:</strong> {{ $evento->local }}</p>
        <p><strong>Descrição:</strong> {{ $evento->descricao }}</p>
        <br>
        <p style="font-size: 12px; color: gray;">Apresente este ingresso na entrada do evento.</p>
    </div>
</body>
</html>
