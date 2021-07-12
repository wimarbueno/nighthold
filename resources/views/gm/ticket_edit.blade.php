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
                                <li class="breadcrumb-item"><a href="{{ route('gm.index') }}">Панель</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('gm.ticket') }}">Тикеты</a></li>
                                <li class="breadcrumb-item active">{{ $ticket->name }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Ответить на тикет</h4>

                            <div class="p-2">
                                <form action="{{ route('gm.ticket.store', [$ticket]) }}" method="post" role="form" class="form-horizontal">
                                    @csrf
                                    @if(!$ticket->assignedTo)
                                    <input type="text"  name="characters" value="{{ auth()->user()->characters->where('realmId', 2)->first()->guid }}" class="form-control form-control-sm" hidden>
                                     @endif
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="example-input-small">Тикет №</label>
                                        <div class="col-md-10">
                                            <input type="text" id="example-input-small" value="{{ $ticket->id }}" class="form-control form-control-sm" placeholder="Тикет №" disabled>
                                        </div>
                                    </div>

                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="example-input-small">Дата обращения</label>
                                        <div class="col-md-10">
                                            <input type="text" id="example-input-small" value="{{ $ticket->createTime->format('d.m.Y H:i') }}" class="form-control form-control-sm" placeholder="Дата обращения" disabled>
                                        </div>
                                    </div>

                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="example-input-small">Персонаж</label>
                                        <div class="col-md-10">
                                            <input type="text" id="example-input-small" value="{{ $ticket->name }}" class="form-control form-control-sm" placeholder="Персонаж" disabled>
                                        </div>
                                    </div>

                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="example-textarea">Сообщение</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" rows="5" disabled>{{ $ticket->description }}</textarea>
                                        </div>
                                    </div>

                                    @if($ticket->assignedTo !== 0)
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="example-input-small">Ответил</label>
                                            <div class="col-md-10">
                                                <input type="text" id="example-input-small" value="{{ $ticket->characters->user->name }}" class="form-control form-control-sm" disabled>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="example-textarea">Ответ</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" name="answer" rows="5">{{ $ticket->comment }}</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="example-textarea">Статус </label>
                                        <div class="col-md-10">
                                            <select class="form-select" name="status">
                                                <option value="0" @if($ticket->type === 0) checked @endif>Открыт</option>
                                                <option value="1" @if($ticket->type === 1) checked @endif>Закрыт</option>
                                                <option value="2" disabled>Закрыт пользователем</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="input-group">
                                                <button class="btn btn-dark waves-effect waves-light" type="submit">Ответить</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
