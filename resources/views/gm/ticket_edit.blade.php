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
                            <h4 class="header-title">Ответить на тикет</h4>

                            <div class="p-2">
                                <form role="form" class="form-horizontal">
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="example-input-small">Small</label>
                                        <div class="col-md-10">
                                            <input type="text" id="example-input-small" name="example-input-small" class="form-control form-control-sm" placeholder=".input-sm">
                                        </div>
                                    </div>

                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="example-input-normal">Normal</label>
                                        <div class="col-md-10">
                                            <input type="text" id="example-input-normal" name="example-input-normal" class="form-control" placeholder="Normal">
                                        </div>
                                    </div>

                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="example-input-large">Large</label>
                                        <div class="col-md-10">
                                            <input type="text" id="example-input-large" name="example-input-large" class="form-control form-control-lg" placeholder=".input-lg">
                                        </div>
                                    </div>

                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label">Grid Sizes</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder=".col-md-4">
                                        </div>
                                    </div>

                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label">Static</label>
                                        <div class="col-md-10">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label">Dropdowns</label>
                                        <div class="col-md-10">
                                            <div class="input-group mb-3">
                                                <button class="btn btn-primary waves-effect waves-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown <i class="mdi mdi-chevron-down"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                    <div role="separator" class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                </div>
                                                <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-2 col-form-label">Buttons</label>
                                        <div class="col-md-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username">

                                                <button class="btn btn-dark waves-effect waves-light" type="button">Button</button>
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
        <script src="{{ asset('gmassets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('gmassets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('gmassets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('gmassets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('gmassets/js/pages/tickets.init.js') }}"></script>
    @endpush
</x-gm-layout>
