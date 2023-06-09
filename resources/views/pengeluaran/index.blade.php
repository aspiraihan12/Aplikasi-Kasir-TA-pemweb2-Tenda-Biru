@extends('layouts.master')

@section('title')
    Daftar Pengeluaran
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Daftar Pengeluaran</li>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
               <button onclick="addForm('{{ route('pengeluaran.store') }}')" class="btn btn-succes btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Tambah </button>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Nominal</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('pengeluaran.form')
@endsection

@push('scripts')
    <script>
        let table;

        $(function (){
            table =  $('.table').DataTable ({
                processing: true;
                autoWidth: false;
                ajax: {
                    url: '{{ route('pengeluaran.data') }}',
                },
                column: [
                    {data: 'DT_RowIndex', searchable: false, sortable: false},
                    {data: 'created_at'},
                    {data: 'deskripsi'},
                    {data: 'nominal'},
                    {data: 'aksi', searchable: false, sortable: false},
                ]
            });

            $('#modal-form').validator().on('submit', function (e) {
                if(! e.preventDefault()) {
                    $.post($('#modal-form form').attr('action'),  $('#modal-form form').serialize())
                    .done((response) => {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menyimpan data');
                        return;
                    });
                }
            });


        });

        function addForm(url) {
            $('#modal-form').modal('show'):
            $('#modal-form .member-title').text('Tambah Pengeluaran');

            $('#modal-form from')[0].reset();
            $('#modal-from from').attr('action', url)
            $('#modal-form [name=_method]').val('post');
            $('#modal-form [nama=deskripsi]').focus();
        }

        function editForm(url) {
            $('#modal-form').modal('show'):
            $('#modal-form .member-title').text('Edit Pengeluaran');

            $('#modal-form from')[0].reset();
            $('#modal-from from').attr('action', url)
            $('#modal-form [name=_method]').val('put');
            $('#modal-form [nama=deskripsi]').focus();

            $.get(url)
                .done((response) => {
                    $('#modal-form [nama=deskripsi]').val(response.deskripsi);
                    $('#modal-form [nama=nominal]').val(response.nominal);
                })
                .fail((errors) => {
                    alert('Tidak dapat menampilkan data')
                    return;
                });
        }

        function deleteData(url){
            if(confirm('Yakin ingin menghapus data terpilih?')){
                $.post(url, {
                    '_token': $(' [name=csrf-token]').attr('content'),
                    '_method': 'delete'

                })
                .done((response) => {
                    table.ajax.reload()
                })
                .fail((errors) => [
                    alert("Tidak dapat menghapus data");
                    return;
                ]);
            }


        }

    </script>

@endpush
