<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Нарушений.нет — Список заявлений</title>
</head>

<body>
    <header>
        <div>
            <h1>НАРУШЕНИЙ.НЕТ</h1>
        </div>
      
    </header>

    <main>
        <a href="{{ route('reports.create') }}">Создать заявление</a><br>


        <div class="container">
            @foreach($reports as $report)
            <div>

                <div>Дата создания: {{ $report->created_at->format('d.m.Y') }}</div>

                <h3>{{ $report->number }}</h3>
                <p>{{ $report->description }}</p>

                <form method="POST" action="{{ route('reports.destroy', $report) }}">

                    @method('delete')
                    @csrf
                    <input type="submit" value="Удалить">
                    <a href="{{ route('reports.edit', $report) }}">Редактировать</a>
                </form>
            </div>
            @endforeach
        </div>
    </main>
</body>

</html>