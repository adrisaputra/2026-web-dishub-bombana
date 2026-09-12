@extends('admin.layout')
@section('content')
<style>
/* CSS untuk tampilan web */
.table-responsive {
  overflow-x: auto;
}

.table {
  width: 100%;
}

/* Atur gaya sesuai kebutuhan Anda */

/* CSS untuk tampilan mobile */
@media  screen and (max-width: 768px) {
  .table-responsive {
    overflow-x: auto;
    margin: 0;
  }
  
  .table {
    width: 100%;
    font-size: 14px;
  }
  
  .table thead {
    display: none;
  }
  
  .table td {
    display: block;
    text-align: left;
    padding: 5px 10px;
  }

  .table td::before {
    content: attr(data-label);
    font-weight: bold;
    display: block;
  }
  
    .table.table-row-bordered tr {
    border-bottom-width: 0px;
    border-bottom-style: solid;
    border-bottom-color: #eff2f5;
    }

    .table {
        --bs-table-bg: transparent;
        --bs-table-accent-bg: transparent;
        --bs-table-striped-color: #181c32;
        --bs-table-striped-bg: #a6dff9;
        --bs-table-active-color: #181c32;
        --bs-table-active-bg: #f5f8fa;
        --bs-table-hover-color: #181c32;
        --bs-table-hover-bg: #f5f8fa;
        width: 100%;
        margin-bottom: 1rem;
        color: #181c32;
        vertical-align: top;
        border-color: #eff2f5;
        }
}
/* Desktop dan Mobile: Tata letak kiri-kanan */
.dataTables_wrapper .dataTables_length,
.dataTables_wrapper .dataTables_filter {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: nowrap;
    margin-bottom: 10px;
}

/* Label rapi */
.dataTables_wrapper .dataTables_length label,
.dataTables_wrapper .dataTables_filter label {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
}

/* Input pencarian */
.dataTables_wrapper .dataTables_filter input {
    width: auto;
    min-width: 140px;
}

/* Select jumlah entries */
.dataTables_wrapper .dataTables_length select {
    width: auto;
    min-width: 60px;
}

/* Responsif untuk layar kecil */
@media (max-width: 768px) {
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        flex: 1 1 50%;
        justify-content: space-between;
    }

    .dataTables_wrapper .dataTables_filter input {
        width: 100px !important;
    }

    .dataTables_wrapper .dataTables_length label,
    .dataTables_wrapper .dataTables_filter label {
        font-size: 13px;
    }
}
/* Default: desktop, tetap sejajar kanan (horizontal) */
[data-kt-survey-table-toolbar="base"] {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    flex-wrap: nowrap;
    gap: 10px;
}

/* Mobile view: ubah jadi atas-bawah */
@media (max-width: 768px) {
    [data-kt-survey-table-toolbar="base"] {
        flex-direction: column;   /* ubah jadi vertikal */
        align-items: stretch;     /* biar semua select lebar penuh */
        width: 100%;
        text-align: left;
        margin-top: 10px;
    }

    [data-kt-survey-table-toolbar="base"] select {
        width: 100%;
        margin-bottom: 8px;
    }
}
</style>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <h3>Data Log Aktifitas</h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <a href="{{ url('/'.Request::segment(1)) }}" class="btn btn-warning btn-icon btn-sm me-2 mb-2" title="Refresh Halaman"><i class="fa fa-undo"></i></a>
                        </div>
                    </div>

                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-rounded border border-gray-300 table-row-bordered table-row-gray-300 gy-2 gs-6" id="log-table">
                            <thead style="background-color: #d30e00;">
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th style="width: 2%;color: white;border-bottom: white;" >Number</th>
                                    <th style="width: 2%;color: white;border-bottom: white;" >No</th>
                                    <th style="color: white;border-bottom: white;">Eksekutor</th>
                                    <th style="color: white;border-bottom: white;">Deskripsi</th>
                                    <th style="color: white;border-bottom: white;">Waktu Eksekusi</th>
                                    {{--<th style="width: 10%;color: white;border-bottom: white;">Aksi</th>--}}
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    var table;

    $(document).ready(function () {
        table = $('#log-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('logs.list') }}",
            columns: [
				{data: 'id', name: 'id', visible: false},
				{data: 'number', name: 'number'}, // Kolom nomor urut
				{data: 'display_name', name: 'name'},
				{data: 'display_description', name: 'description'},
				{data: 'display_execution_time', name: 'execution_time'},
				// {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
			order: [
				[0, 'desc'] // Mengatur pengurutan kolom pertama (id) secara descending
			],
            paging: true,
			drawCallback: function () {
                var api = this.api();
                var startIndex = api.context[0]._iDisplayStart; // Indeks baris pertama di halaman
                api.column(1, {page: 'current'}).nodes().each(function (cell, i) {
                    cell.innerHTML = startIndex + i + 1; // Menghitung nomor urut berdasarkan indeks baris dan nomor halaman
                });
            }
        });
    });

</script>

       
@endsection