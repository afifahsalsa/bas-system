@extends('layouts.main')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h5>Order</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive p-0">
                            <form action="{{ route('order.create') }}" method="POST" id="sendOrder">
                                @csrf
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Barcode</th>
                                            <th>Nama</th>
                                            <th>Qty</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td>
                                            <input type="text" id="barcode" name="barcode" class="form-control" style="width: auto" value="{{ old('barcode') }}" autofocus onblur="this.form.submit()">
                                        </td>
                                        <td>
                                            <input type="text" id="nama" name="nama" class="form-control" style="width: auto" value="{{ old('nama') }}" readonly>
                                        </td>
                                        <td>
                                            <input type="text" id="qty" name="qty" class="form-control" style="width: auto" value="{{ old('qty', 1) }}" oninput="calculateTotal()">
                                        </td>
                                        <td>
                                            <input type="text" id="harga" name="harga" class="form-control" style="width: auto" value="{{ old('harga') }}" readonly>
                                        </td>
                                        <td>
                                            <input type="text" id="total" name="total" class="form-control" style="width: auto" value="{{ old('total') }}" readonly>
                                        </td>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h5>Data Order</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive p-0">
                            <table class="table table-striped" id="orderTable">
                                <thead>
                                    <tr>
                                        <th>Barcode</th>
                                        <th>Nama</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $od)
                                        <td>
                                            <p class="text-xs font-weight-bold float-start">{{ $od->barcode }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold float-start">{{ $od->nama }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold float-start">{{ $od->qty }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold float-start">{{ $od->harga }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold float-start">{{ $od->total }}</p>
                                        </td>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <button type="submit" class="btn btn-primary btn-xs float-end">Submit</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function calculateTotal(){
            let qty = document.getElementById('qty').value;
            let harga = document.getElementById('harga').value;
            let total = qty*harga;
            document.getElementById('total').value = total;
        }
    </script>
@endsection
