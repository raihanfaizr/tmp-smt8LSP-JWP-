@extends('admin.layout.main')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
    </div>
  @endif

  <div class="row">
    <div class="card">
      <div class="card-body">
        <ul class="nav nav-pills my-4" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#requested-tab" role="tab" aria-controls="requested-tab" aria-selected="true">Requested</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#accepted-tab" role="tab" aria-controls="accepted-tab" aria-selected="false">Accepted</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#rejected-tab" role="tab" aria-controls="rejected-tab" aria-selected="false">Rejected</button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="requested-tab" role="tabpanel">
            <table id="requested" class="table stripe" style="width:100%">
              <thead>
                  <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Pemesan</th>
                      <th class="text-center">No HP Pemesan</th>
                      <th class="text-center">Email Pemesan</th>
                      <th class="text-center">Lokasi</th>
                      <th class="text-center">Produk</th>
                      <th class="text-center" style="width: 70px;">Opsi</th>
                  </tr>
              </thead>
              <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($order as $item)
                @if ($item->order_status == 'requested')
                  <tr>
                      <td class="text-center">{{ $no++ }}</td>
                      <td class="text-center">{{ $item->nama_pemesan }}</td>
                      <td class="text-center">{{ $item->no_hp_pemesan }}</td>
                      <td class="text-center">{{ $item->email_pemesan }}</td>
                      <td class="text-center">{{ $item->lokasi }}</td>
                      <td class="text-center">{{ $item->nama_produk }}</td>
                      <td class="text-center">
                        <a href="/admin/order/{{ $item->id }}/edit/" class="btn btn-sm btn-primary mb-1 w-100">Edit</a>
                        <a href="/admin/order/status?id={{ $item->id }}&changeStatus=accepted" class="btn btn-sm btn-success mb-1 w-100" onclick="return confirm('Apakah anda yakin akan menerima order ini?')">Accept</a>
                        <a href="/admin/order/status?id={{ $item->id }}&changeStatus=rejected" class="btn btn-sm btn-danger mb-1 w-100" onclick="return confirm('Apakah anda yakin akan menolak order ini?')">Reject</a>
                        {{-- <form action="/admin/order/{{ $item->id }}" method="post" style="display: inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">
                            Delete
                          </button>
                        </form> --}}
                      </td>
                  </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="accepted-tab" role="tabpanel">
            <table id="accepted" class="table stripe" style="width:100%">
              <thead>
                  <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Pemesan</th>
                      <th class="text-center">No HP Pemesan</th>
                      <th class="text-center">Email Pemesan</th>
                      <th class="text-center">Lokasi</th>
                      <th class="text-center">Produk</th>
                      <th class="text-center" style="width: 70px;">Opsi</th>
                  </tr>
              </thead>
              <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($order as $item)
                @if ($item->order_status == 'accepted')
                  <tr>
                      <td class="text-center">{{ $no++ }}</td>
                      <td class="text-center">{{ $item->nama_pemesan }}</td>
                      <td class="text-center">{{ $item->no_hp_pemesan }}</td>
                      <td class="text-center">{{ $item->email_pemesan }}</td>
                      <td class="text-center">{{ $item->lokasi }}</td>
                      <td class="text-center">{{ $item->nama_produk }}</td>
                      <td class="text-center">
                        <a href="/admin/order/{{ $item->id }}/edit/" class="btn btn-sm btn-primary mb-1 w-100">Edit</a>
                        <a href="/admin/order/status?id={{ $item->id }}&changeStatus=accepted" class="btn btn-sm btn-success mb-1 w-100" onclick="return confirm('Apakah anda yakin akan menerima order ini?')">Accept</a>
                        <a href="/admin/order/status?id={{ $item->id }}&changeStatus=rejected" class="btn btn-sm btn-danger mb-1 w-100" onclick="return confirm('Apakah anda yakin akan menolak order ini?')">Reject</a>
                        {{-- <form action="/admin/order/{{ $item->id }}" method="post" style="display: inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">
                            Delete
                          </button>
                        </form> --}}
                      </td>
                  </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="rejected-tab" role="tabpanel">
            <table id="rejected" class="table stripe" style="width:100%">
              <thead>
                  <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Pemesan</th>
                      <th class="text-center">No HP Pemesan</th>
                      <th class="text-center">Email Pemesan</th>
                      <th class="text-center">Lokasi</th>
                      <th class="text-center">Produk</th>
                      <th class="text-center" style="width: 70px;">Opsi</th>
                  </tr>
              </thead>
              <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($order as $item)
                @if ($item->order_status == 'rejected')
                  <tr>
                      <td class="text-center">{{ $no++ }}</td>
                      <td class="text-center">{{ $item->nama_pemesan }}</td>
                      <td class="text-center">{{ $item->no_hp_pemesan }}</td>
                      <td class="text-center">{{ $item->email_pemesan }}</td>
                      <td class="text-center">{{ $item->lokasi }}</td>
                      <td class="text-center">{{ $item->nama_produk }}</td>
                      <td class="text-center">
                        <a href="/admin/order/{{ $item->id }}/edit/" class="btn btn-sm btn-primary mb-1 w-100">Edit</a>
                        <a href="/admin/order/status?id={{ $item->id }}&changeStatus=accepted" class="btn btn-sm btn-success mb-1 w-100" onclick="return confirm('Apakah anda yakin akan menerima order ini?')">Accept</a>
                        <a href="/admin/order/status?id={{ $item->id }}&changeStatus=rejected" class="btn btn-sm btn-danger mb-1 w-100" onclick="return confirm('Apakah anda yakin akan menolak order ini?')">Reject</a>
                        {{-- <form action="/admin/order/{{ $item->id }}" method="post" style="display: inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">
                            Delete
                          </button>
                        </form> --}}
                      </td>
                  </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>	
  new DataTable('#requested');
  new DataTable('#accepted');
  new DataTable('#rejected');
</script>

@endsection