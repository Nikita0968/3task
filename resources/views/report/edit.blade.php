<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Редактирование заявления</title>
</head>

<body>
    <h1>Редактировать заявление</h1>


    <form method="POST" action="{{route('report.update', $report)}}">
        @csrf
        @method('put')

        <label>Госномер:</label><br>
        <input type="text" name="number" value="{{ $report->number }}"><br>

        <label>Описание:</label><br>
        <textarea name="description">{{ $report->description }}</textarea><br>

        <input type="submit" value="Сохранить">
    </form>
</body>

</html>