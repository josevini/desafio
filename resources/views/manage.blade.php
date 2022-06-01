@extends('home')

@section('content')
    @foreach($albums as $album)
        <div class="listing">
            <div class="div-album">
                <h2 class="album-name">Álbum: {{ $album->name }}, {{ $album->date }}</h2>
                <form action="{{ route('delete-album', $album->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="remover" class="delete" />
                </form>
            </div>
            @foreach(\App\Models\Music::query()->where('album_id', $album->id)->get() as $music)
                <div class="div-music">
                    {{ $music->name }}
                    <form action="{{ route('delete-music', [$music->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input class="delete" type="submit" value="remover">
                    </form>
                </div>
            @endforeach
        </div>
    @endforeach
    <a class="btn" href="{{ route('home') }}">
        voltar
    </a>
@endsection
