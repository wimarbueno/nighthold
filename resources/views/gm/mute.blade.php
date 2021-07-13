<x-gm-layout>
    @push('css')

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
                                    <li class="breadcrumb-item active">Выдать мут</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Выдать мут</h4>

                                <div class="p-2">
                                    <form action="{{ route('gm.mute.store') }}" method="post" role="form" class="form-horizontal">
                                        @csrf
                                        <div class="row mb-3">
                                            <label class="col-md-2 col-form-label" for="example-input-small">Персонаж</label>
                                            <div class="col-sm-9">
                                                <input type="text"  name="characters" class="form-control" placeholder="Персонаж">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-md-2 col-form-label" for="example-input-normal">Время</label>
                                            <div class="col-sm-9">
                                                <input type="number" name="time" class="form-control" placeholder="Время в минутах">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-md-2 col-form-label" for="example-input-large">Причина</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="reason" class="form-control" placeholder="Причина">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <button class="btn btn-dark waves-effect waves-light" type="submit">Отправить</button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div>
            </div>
        </div>
    @push('scripts')

    @endpush
</x-gm-layout>
