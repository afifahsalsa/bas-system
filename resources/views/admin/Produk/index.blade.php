@extends('layouts.main')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h5>Daftar Produk</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive p-0">
                            {{-- Button add produk --}}
                            <button type="button" class="btn btn-secondary btn-xs float-end" data-bs-toggle="modal"
                                data-bs-target="#addProdukModal">
                                Tambah Produk
                            </button>
                            {{-- Modal Add Produk --}}
                            <div class="modal fade" id="addProdukModal" tabindex="-1" aria-labelledby="addProdukModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="addProdukModalLabel">Add New Produk</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('produk.create') }}" method="POST" id="addNewProduk">
                                                @csrf
                                                <div class="mb-2">
                                                    <label for="barcode" class="col-form-label">Barcode: </label>
                                                    <input type="text" class="form-control" id="barcode"
                                                        name="barcode">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="nama_produk" class="col-form-label">Nama: </label>
                                                    <input type="text" class="form-control" id="nama_produk"
                                                        name="nama_produk">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="merk" class="col-form-label">Merk: </label>
                                                    <input type="text" class="form-control" id="merk"
                                                        name="merk">
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col">
                                                        <label for="qty" class="col-form-label">Qty: </label>
                                                        <input type="number" class="form-control" id="qty"
                                                            name="qty">
                                                    </div>
                                                    <div class="col">
                                                        <label for="harga_jual" class="col-form-label">Harga Jual: </label>
                                                        <input type="number" class="form-control" id="harga_jual"
                                                            name="harga_jual">
                                                    </div>
                                                    <div class="col">
                                                        <label for="harga_beli" class="col-form-label">Harga Beli: </label>
                                                        <input type="number" class="form-control" id="harga_beli"
                                                            name="harga_beli">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col">
                                                        <label for="satuan" class="col-form-label">Satuan: </label>
                                                        <input type="text" class="form-control" id="satuan"
                                                            name="satuan">
                                                    </div>
                                                    <div class="col">
                                                        <label for="kategori_id" class="col-form-label">Kategori: </label>
                                                        <select name="kategori" class="form-select" id="kategori_id">
                                                            @foreach ($kategoriId as $ki)
                                                                <option value="{{ $ki->kategori }}">{{ $ki->kategori }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" form="addNewProduk">Send
                                                message</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table align-items-center mb-0 display compact" style="width: 100%;"
                                id="tableProduk">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary  font-weight-bolder" style="width: 5%;">
                                            No</th>
                                        <th class="text-uppercase text-secondary  font-weight-bolder" style="width: auto;">
                                            Barcode</th>
                                        <th class="text-uppercase text-secondary  font-weight-bolder ps-2"
                                            style="width: auto">
                                            Nama</th>
                                        <th class="text-uppercase text-secondary  font-weight-bolder ps-2"
                                            style="width: auto">
                                            Merk</th>
                                        <th class="text-uppercase text-secondary  font-weight-bolder ps-2"
                                            style="width: auto">
                                            Qty</th>
                                        <th class="text-uppercase text-secondary  font-weight-bolder ps-2"
                                            style="width: auto">
                                            Harga Jual</th>
                                        <th class="text-uppercase text-secondary  font-weight-bolder ps-2"
                                            style="width: auto">
                                            Harga Beli</th>
                                        <th class="text-uppercase text-secondary  font-weight-bolder ps-2"
                                            style="width: auto">
                                            Satuan</th>
                                        <th class="text-uppercase text-secondary  font-weight-bolder ps-2"
                                            style="width: auto">
                                            Kategori</th>
                                        <th class="text-uppercase text-secondary  font-weight-bolder ps-2"
                                            style="width: auto">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenisProduk as $p)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm" style="margin-left: 10px;">
                                                            {{ $loop->iteration }}</h6>
                                                        {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold float-start">{{ $p->barcode }}</p>
                                                {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold float-start">{{ $p->nama }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold float-start">{{ $p->merk }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold float-start">{{ $p->qty }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold float-start">{{ $p->harga_jual }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold float-start">{{ $p->harga_beli }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold float-start">{{ $p->satuan }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold float-start">
                                                    {{ $p->kategori->kategori }}</p>
                                            </td>
                                            <td>
                                                {{-- Button Edit Produk --}}
                                                <button type="button" class="btn btn-info btn-xs mb-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal-{{ $p->barcode }}">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </button>
                                                {{-- Modal Edit Produk --}}
                                                <div class="modal fade" id="editModal-{{ $p->barcode }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5">
                                                                    Edit Produk</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('produk.update', $p->barcode) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="mb-2">
                                                                        <label for="barcode" class="col-form-label">Barcode: </label>
                                                                        <input type="text" class="form-control" id="barcode"
                                                                            name="barcode" value="{{ $p->barcode }}">
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label for="nama_produk" class="col-form-label">Nama: </label>
                                                                        <input type="text" class="form-control" id="nama_produk"
                                                                            name="nama" value="{{ $p->nama }}">
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label for="merk" class="col-form-label">Merk: </label>
                                                                        <input disabled class="form-control" id="merk"
                                                                            name="merk" value="{{ $p->merk }}">
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col">
                                                                            <label for="qty" class="col-form-label">Qty: </label>
                                                                            <input type="number" class="form-control" id="qty"
                                                                                name="qty" value="{{ $p->qty }}">
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="harga_jual" class="col-form-label">Harga Jual: </label>
                                                                            <input type="number" class="form-control" id="harga_jual"
                                                                                name="harga_jual" value="{{ $p->harga_jual }}">
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="harga_beli" class="col-form-label">Harga Beli: </label>
                                                                            <input type="number" class="form-control" id="harga_beli"
                                                                                name="harga_beli" value="{{ $p->harga_beli }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col">
                                                                            <label for="satuan" class="col-form-label">Satuan: </label>
                                                                            <input type="text" class="form-control" id="satuan"
                                                                                name="satuan" value="{{ $p->satuan }}">
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="kategori_id" class="col-form-label">Kategori: </label>
                                                                            <input disabled class="form-control" id="kategori_id" name="kategori_id" value="{{ $p->kategori->kategori }}">
                                                                        </div>
                                                                    </div>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Update</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Button Delete Produk --}}
                                                <button type="button" class="btn btn-danger btn-xs mb-1"
                                                    onclick="confirmDelete('{{ $p->barcode }}')"><i class="fa fa-trash">
                                                    </i>
                                                </button>
                                                {{-- Form Delete Produk --}}
                                                <form action="{{ route('produk.delete', $p->barcode) }}" method="post"
                                                    id="deleteForm{{ $p->barcode }}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
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
    </div>
    <script>
        $('#tableProduk').DataTable();
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
@endsection
