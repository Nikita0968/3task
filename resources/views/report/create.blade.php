<!DOCTYPE html>
<html lang="ru">

<head>
@Vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница создания заявленй</title>
</head>

<body>
<x-app-layout>
    <header>НАРУШЕНИЙ.НЕТ</header>
    <div class="container">
        <form action="{{ route('report.store') }}" method="POST">@csrf
            <input name="number" type="text" placeholder="Введите госномер" required><br>
            <textarea name="description" cols="30" rows="10" placeholder="Опишите нарушение" required></textarea><br>
            <input type="submit" value="Создать заявление">
        </form>

    </div>
    </x-app-layout>
</body>

</html>