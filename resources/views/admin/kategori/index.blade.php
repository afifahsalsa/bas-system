@extends('layouts.main')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h5>Daftar Kategori</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0 display compact" style="width: 100%;"
                                id="tableKategori">
                                {{-- Button Add --}}
                                <button class="btn btn-primary btn-xs float-end m-1" data-bs-toggle="modal"
                                    data-bs-target="#addKategori">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="addKategori" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Kategori</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('kategori.create') }}" method="POST"
                                                    id="addKategoriForm">
                                                    @csrf
                                                    <input type="text" name="kategori" id=""
                                                        placeholder="Inputkan Kategori ..." class="form-control">
                                                </form>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        form="addKategoriForm">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary  font-weight-bolder" style="width: 5%;">
                                            No</th>
                                        <th class="text-uppercase text-secondary  font-weight-bolder ps-2"
                                            style="width: 50%">
                                            Kategori</th>
                                        <th class="text-uppercase text-secondary  font-weight-bolder" style="width: 50%">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenisKategori as $k)
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
                                                <p class="text-xs font-weight-bold mb-0 ps-2">{{ $k->kategori }}</p>
                                                {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                            </td>
                                            <td>
                                                {{-- Button Edit Kategori --}}
                                                <button type="button" class="btn btn-info btn-xs mb-1"
                                                    data-bs-toggle="modal" data-bs-target="#editModal-{{ $k->id }}">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </button>
                                                {{-- Modal Edit Kategori --}}
                                                <div class="modal fade" id="editModal-{{ $k->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5">
                                                                    Edit Kategori</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('kategori.update', $k->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="mb-3 text-start">
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $k->kategori }}" name="kategori">
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
                                                {{-- Button Delete Kategori --}}
                                                <button type="button" class="btn btn-danger btn-xs mb-1"
                                                    onclick="confirmDelete('{{ $k->id }}')"><i class="fa fa-trash">
                                                    </i>
                                                </button>
                                                {{-- Form Delete Kategori --}}
                                                <form action="{{ route('kategori.delete', $k->id) }}" method="post"
                                                    id="deleteForm{{ $k->id }}">
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
        $('#tableKategori').DataTable();

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
