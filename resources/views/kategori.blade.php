<h1>{{ $category->nama_kategori }}
</h1>

@foreach ($konten as $item)
    <p>{{ $item->judul }}</p>
@endforeach