@extends('template')

@section('content')

<style>
    .category-card {
        background: #ffffff;
        border-radius: 18px;
        padding: 25px 10px;
        text-align: center;
        transition: 0.25s;
        box-shadow: 0 4px 12px rgba(0,0,0,0.06);
        border: 1px solid #f0f0f0;
        cursor: pointer;
    }

    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 18px rgba(0,0,0,0.10);
    }

    .category-icon {
        width: 55px;
        height: 55px;
        border-radius: 14px;
        margin: 0 auto 12px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 26px;
        font-weight: bold;
        color: #555;
    }

    .category-title {
        font-size: 15px;
        font-weight: bold;
        color: #333;
    }
</style>

<div class="container mt-5 mb-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Category</h3>
    </div>

    @php
        // ICON & WARNA BACKGROUND SAMA SEPERTI DI BERANDA
        $icons = [
            'minuman'         => ['🥤', '#FFE9F3'],
            'makanan ringan'  => ['🍪', '#FFF4DE'],
            'makanan berat'   => ['🥐', '#E6F7FF'],
            'buah'            => ['🍎', '#E7FFE9'],
            'sayur'           => ['🥦', '#F1FFF0'],
            'bumbu'           => ['🧂', '#FFF3F0'],
            'daging'          => ['🍗', '#FFF0F0'],
            'seafood'         => ['🐟', '#E8F5FF'],
        ];

        $defaultIcon = ['🛒', '#F5F5F5'];
    @endphp

    <div class="row g-4">

        @foreach ($kategoris as $k)

            @php
                $key = strtolower($k->nama_kategori);
                $icon = $icons[$key][0] ?? $defaultIcon[0];
                $bg   = $icons[$key][1] ?? $defaultIcon[1];
            @endphp

            <div class="col-3">
                <a href="{{ route('kategori.show', $k->id_kategori) }}" class="text-decoration-none">
                    <div class="category-card">
                        <div class="category-icon" style="background: {{ $bg }};">
                            {{ $icon }}
                        </div>
                        <div class="category-title">{{ $k->nama_kategori }}</div>
                    </div>
                </a>
            </div>

        @endforeach

    </div>

</div>

@endsection
