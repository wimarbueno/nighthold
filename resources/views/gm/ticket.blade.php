<x-gm-layout>
@push('css')
    <link class="js-stylesheet" href="{{ asset('assetsgm/css/light.css') }}" rel="stylesheet">
    <style>
        body {
            opacity: 0;
        }
    </style>
@endpush
<main class="content">
    <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Тикеты</h1>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5 class="card-title mb-0">Тикеты</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Персонаж</th>
                                    <th>Сообщение</th>
                                    <th>Статус</th>
                                    <th>Дата</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ticket as $item)
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
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Открыть
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <a class="dropdown-item" href="#">Закрыть</a>
                                                <a class="dropdown-item" href="#">Ответить</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Удалить</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</main>
@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        setTimeout(function(){
            if(localStorage.getItem('popState') !== 'shown'){
                window.notyf.open({
                    type: "success",
                    message: "Get access to all 500+ components and 45+ pages with AdminKit PRO. <u><a class=\"text-white\" href=\"https://adminkit.io/pricing\" target=\"_blank\">More info</a></u> 🚀",
                    duration: 10000,
                    ripple: true,
                    dismissible: false,
                    position: {
                        x: "left",
                        y: "bottom"
                    }
                });

                localStorage.setItem('popState','shown');
            }
        }, 15000);
    });
</script>
@endpush
</x-gm-layout>
