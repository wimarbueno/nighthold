<x-gm-layout>
    @push('css')

    @endpush
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Главная</h1>

        <div class="row">
            <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Последние открытые тикеты</h5>
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Персонаж</th>
                            <th>Сообщение</th>
                            <th>Статус</th>
                            <th>Дата</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($ticket as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{  Str::limit($item->description, 20)}}</td>
                                <td>
                                    @if($item->type === 0)
                                        <span class="badge bg-success">Открыто</span>
                                    @elseif($item->type === 1)
                                        <span class="badge bg-info">Закрыто</span>
                                    @elseif($item->type === 2)
                                        <span class="badge bg-danger">Удалено</span>
                                    @endif
                                </td>
                                <td>{{ $item->createTime->format('d.m.Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr><td>Тикетов не найдено</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</main>
@push('scripts')
  
@endpush
</x-gm-layout>
