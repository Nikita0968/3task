<!DOCTYPE html>
<html lang="ru">

<head>
@Vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <title>Нарушений.нет</title>
</head>

<body>
    <header>
        <div>
            <h1>НАРУШЕНИЙ.НЕТ</h1>
        </div>
        <div>
            <p>{{ auth()->user()->fio ?? 'ФИО пользователя' }}</p>
        </div>
        <x-app-layout>
        <div>
            <p>Фильтрация по статусу заявки</p>
            <ul>
            
                @foreach ($statuses as $statusItem)
                <li>
                    <a href="{{ route('report.index', ['sort' => $sort, 'status' => $statusItem->id]) }}">{{ $statusItem->name }}</a>
                </li>
                @endforeach
            
            </ul>
        </div>
        
        <div>
            <span>Сортировка по дате создания</span>
            <a href="{{ route('report.index', ['sort' => 'desc', 'status' => $status]) }}">сначала новые</a>
            <a href="{{ route('report.index', ['sort' => 'asc', 'status' => $status]) }}">сначала старые</a>
        </div>
    </header>

    <main>
        <a href="{{ route('report.create') }}">создать заявление</a><br><br>

        <div>
            @foreach($reports as $report)
            <div>
                <span>{{ $report->created_at->format('d.m.Y') }}</span>
                <div>
                    <a href="{{ route('report.edit', $report->id) }}">Редактировать</a>
                    <form action="{{ route('report.destroy', $report->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Удалить?')">Удалить</button>
                    </form>
                </div>

                <h3>{{ $report->number }}</h3>
                <p>{{ $report->description }}</p>
                <p>{{ $report->created_at }}</p>
                <p>{{ $report->status->name }}</p>
            </div>
            @endforeach
            
            {{ $reports->appends(['sort' => $sort, 'status' => $status])->links() }}
        </div>
        </x-app-layout>
    </main>

</body>

</html>