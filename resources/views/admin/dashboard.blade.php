@extends('admin.template')
@section('content')

<div class="container-fluid mt-4">

    <div class="card shadow p-3" style="background-color: #ffffff; border-radius: 10px; border: 1px solid #dce3f0">

        {{-- ==================== CARDS ==================== --}}
        @if(Auth::user()->role == 'admin')

        <div class="row">
            {{-- total user --}}
            <div class="col-md-3">
                <div class="card bg-primary text-white p-3">
                    <h5>User</h5>
                    <p>{{ $totalUser }}</p>
                </div>
            </div>

            {{-- total toko --}}
            <div class="col-md-3">
                <div class="card bg-primary text-white p-3">
                    <h5>Toko</h5>
                    <p>{{ $totalToko }}</p>
                </div>
            </div>



            {{-- total kategori --}}
            <div class="col-md-3">
                <div class="card bg-primary text-white p-3">
                    <h5>Kategori</h5>
                    <p>{{ $totalKategori }}</p>
                </div>
            </div>

        </div>

        @endif
        {{-- total produk --}}
            <div class="col-md-3">
                <div class="card bg-primary text-white p-3">
                    <h5>Produk</h5>
                    <p>{{ $totalProduk }}</p>
                </div>
            </div>
    </div>
</div>

@endsection
