@extends('admin.template')
@section('content')

<div class="container-fluid mt-4">

    <div class="card shadow p-3"
         style="background-color: #ffffff; border-radius: 10px; border: 1px solid #dce3f0">

        <div class="row">

            @if(Auth::user()->role == 'admin')

            {{-- total user --}}
            <div class="col-md-3 mb-3">
                <div class="card p-3" style="border-left: 5px solid #007bff;">
                    <h5 class="mb-1">User</h5>
                    <h4 class="fw-bold text-primary">{{ $totalUser }}</h4>
                </div>
            </div>

            {{-- total toko --}}
            <div class="col-md-3 mb-3">
                <div class="card p-3" style="border-left: 5px solid #007bff;">
                    <h5 class="mb-1">Toko</h5>
                    <h4 class="fw-bold text-primary">{{ $totalToko }}</h4>
                </div>
            </div>

            {{-- total kategori --}}
            <div class="col-md-3 mb-3">
                <div class="card p-3" style="border-left: 5px solid #007bff;">
                    <h5 class="mb-1">Kategori</h5>
                    <h4 class="fw-bold text-primary">{{ $totalKategori }}</h4>
                </div>
            </div>

            @endif

            {{-- total produk --}}
            <div class="col-md-3 mb-3">
                <div class="card p-3" style="border-left: 5px solid #007bff;">
                    <h5 class="mb-1">Produk</h5>
                    <h4 class="fw-bold text-primary">{{ $totalProduk }}</h4>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
