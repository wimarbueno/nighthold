<x-gm-layout>
    @push('css')
        <link href="{{ asset('gmassets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('gmassets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Главная</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Панель</a></li>
                                <li class="breadcrumb-item active">Тикеты</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-md-6 col-xl-3">
                                        <div class="py-1">
                                            <i class="fe-tag font-24"></i>
                                            <h3>{{ $ticket->count() }}</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Всего тикетов</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-3">
                                        <div class="py-1">
                                            <i class="fe-archive font-24"></i>
                                            <h3 class="text-warning">{{ $ticket->where('type', 0)->count() }}</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Открытых тикетов</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-3">
                                        <div class="py-1">
                                            <i class="fe-shield font-24"></i>
                                            <h3 class="text-success">{{ $ticket->where('type', 1)->count() }}</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Закрытых тикетов</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-3">
                                        <div class="py-1">
                                            <i class="fe-delete font-24"></i>
                                            <h3 class="text-danger">{{ $ticket->where('type', 2)->count() }}</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Удалено тикетов</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" cellspacing="0" id="tickets-table">
                                <thead class="bg-light">
                                <tr>
                                    <th class="fw-medium">ID</th>
                                    <th class="fw-medium">Персонаж</th>
                                    <th class="fw-medium">Сообщение</th>
                                    <th class="fw-medium">Статус</th>
                                    <th class="fw-medium">Дата</th>
                                    <th class="fw-medium">Ответил</th>
                                    <th class="fw-medium">Просмотрен</th>
                                    <th class="fw-medium">Обновлено</th>
                                    <th class="fw-medium">Действие</th>
                                </tr>
                                </thead>

                                <tbody class="font-14">
                                @forelse ($ticket as $item)
                                    <tr>
                                        <td><b>#{{ $loop->iteration }}</b></td>
                                        <td>
                                            <a href="javascript: void(0);" class="text-dark">
                                                <span class="ms-2">{{ $item->name }}</span>
                                            </a>
                                        </td>

                                        <td>
                                            {{ Str::limit($item->description, 20)}}
                                        </td>

                                        <td>
                                            @if($item->type === 0)
                                                <span class="badge bg-success">Открыто</span>
                                            @elseif($item->type === 1)
                                                <span class="badge bg-info">Закрыто</span>
                                            @elseif($item->type === 2)
                                                <span class="badge badge-soft-warning">Закрыто пользователем</span>
                                            @endif
                                        </td>

                                        <td>
                                            {{ $item->createTime->format('d.m.Y H:i') }}
                                        </td>

                                        <td>
                                            @if($item->assignedTo)
                                                <span class="badge bg-secondary text-light">{{ $item->characters->user->name }}</span>
                                            @else
                                                 Ответа нет
                                            @endif
                                        </td>

                                        <td>
                                            @if($item->viewed === 0)
                                            <span class="badge bg-info text-light">Новый</span>
                                            @else
                                            <span class="badge bg-success text-light">Просмотрен</span>
                                            @endif
                                        </td>

                                        <td>
                                            {{ $item->lastModifiedTime->format('d.m.Y H:i') }}
                                        </td>

                                        <td>
                                            <div class="btn-group dropdown">
                                                <a href="#" class="dropdown-toggle arrow-none btn btn-light btn-sm" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="{{ route('gm.ticket.edit', $item) }}"><i class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Ответить</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-check-all me-2 text-muted font-18 vertical-middle"></i>Закрыть</a>
                                                </div>
                                            </div>
                                        </td>
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
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('gmassets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('gmassets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('gmassets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('gmassets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('gmassets/js/pages/tickets.init.js') }}"></script>
    @endpush
</x-gm-layout>
