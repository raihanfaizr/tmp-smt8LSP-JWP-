@extends('admin.layout.main')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Laporan order</h3>
            <hr>
            <table id="table" class="table stripe" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Pemesan</th>
                        <th class="text-center">No HP Pemesan</th>
                        <th class="text-center">Email Pemesan</th>
                        <th class="text-center">Lokasi</th>
                        <th class="text-center">Produk</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Catatan</th>
                    </tr>
                </thead>
                <tbody>
                  @php
                      $no = 1;
                  @endphp
                  @foreach ($order as $item)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ $item->nama_pemesan }}</td>
                        <td class="text-center">{{ $item->no_hp_pemesan }}</td>
                        <td class="text-center">{{ $item->email_pemesan }}</td>
                        <td class="text-center">{{ $item->lokasi }}</td>
                        <td class="text-center">{{ $item->nama_produk }}</td>
                        <td class="text-center">{{ $item->order_status }}</td>
                        <td class="text-center">{{ $item->catatan }}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script> --}}
<script src="https://cdn.datatables.net/buttons/3.1.0/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.print.min.js"></script>
<script>
    new DataTable('#table', {
        layout: {
        topStart: {
            buttons: ['excel', 'pdf', 'print']
        }
        }
    });
</script>

@endsection