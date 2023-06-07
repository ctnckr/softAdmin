@extends('backend.app')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Menüler</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Menü</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Menü Listesi</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Menü Adı</th>
                                <th>Sayfa Adı</th>
                                <th>Oluşturulma Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody id="sortable">
                            @foreach($menus as $menu)
                            <tr id="item-{{$menu->id}}">
                                <td class="sortable">{{$menu->menu_name}}</td>
                                <td>{{$menu->page_id}}</td>
                                <td>{{$menu->created_at}}</td>
                                <td>
                                    <a href="page-edit.html" class="btn btn-primary"><i class="fas fa-edit"></i>&nbsp;Düzenle</a>
                                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i>&nbsp;Sil
                                    </button>
                                    <button class="btn btn-success"><i class="fas fa-eye"></i>&nbsp;Aktif/Pasif
                                    </button>
                                </td>
                            </tr>
                            @foreach($menu -> children as $downMenu)
                                <tr id="item-{{$downMenu->id}}">
                                    <td class="sortable">{{$menu->menu_name}} -> {{$downMenu->menu_name}}</td>
                                    <td>{{$downMenu->page_id}}</td>
                                    <td>{{$downMenu->created_at}}</td>
                                    <td>
                                        <a href="page-edit.html" class="btn btn-primary"><i class="fas fa-edit"></i>&nbsp;Düzenle</a>
                                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i>&nbsp;Sil
                                        </button>
                                        <button class="btn btn-success"><i class="fas fa-eye"></i>&nbsp;Aktif/Pasif
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')

<script>
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#sortable').sortable({
            revert: true,
            handle: ".sortable",
            stop: function (event, ui) {
                var data = $(this).sortable('serialize');
                $.ajax({
                    type: "POST",
                    data: data,
                    url: "{{route('menus')}}",
                    success: function (response) {
                        if (response.status=="success"){
                            toastr.success(response.content, response.title);
                        }
                        else{
                            toastr.error(response.content, response.title);
                        }
                    }
                });

            }
        });
        $('#sortable').disableSelection();

    });
</script>
@endsection


