<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro 404 - Página não encontrada</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
        }

        .error-title {
            font-size: 72px;
            font-weight: bold;
            color: #333;
        }

        .error-message {
            font-size: 24px;
            color: #666;
            margin-bottom: 20px;
        }

        .back-button {
            margin-top: 20px;
            padding: 12px 25px;
            font-size: 18px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            box-shadow: 0 8px 15px rgba(0, 123, 255, 0.3);
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background-color: #0056b3;
            box-shadow: 0 12px 20px rgba(0, 86, 179, 0.4);
            transform: translateY(-3px);
        }

        .back-button:active {
            transform: translateY(1px);
            box-shadow: 0 5px 10px rgba(0, 86, 179, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-title">Erro 404</div>
        <div class="error-message">Página não encontrada</div>
        <button class="back-button" onclick="history.back()">Voltar</button>
    </div>
</body>
</html>
