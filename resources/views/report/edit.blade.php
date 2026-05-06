<!DOCTYPE html>
<html lang="ru">
<head>
@Vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <title>Создание заявления</title>
</head>
<body>
    <x-app-layout>
    <h2>Редактировать заявление</h2>
   
    <form method="POST" action="{{ route('report.update', $report->id) }}">
        @csrf
        @method('PUT')
        
        <div>
            <label>Регистрационный номер авто</label><br>
            <input type="text" name="number" value="{{ $report->number }}" required>
        </div>

        <br>

        <div>
            <label>Описание нарушения</label><br>
            <textarea name="description" rows="4" required>{{ $report->description }}</textarea>
        </div>
        
        <br>
        <button type="submit">Обновить</button>
    </form>

    <br>
    </x-app-layout>
</body>
</html>