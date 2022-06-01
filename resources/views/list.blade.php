@extends('home')

@section('content')
    <form class="search" method="get" action="{{ route('search') }}">
        @csrf
        <input class="input-search" type="text" placeholder="Digite uma palavra chave" name="search_value" />
        <input class="submit" value="Procurar" type="submit" />
    </form>
    @foreach($albums as $album)
        <div class="listing">
            <div class="div-album">
                <h2 class="album-name">Álbum: {{ $album->name }}, {{ $album->date }}</h2>
                <form action="{{ route('delete-album', $album->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="remover album" class="delete-album" />
                </form>
            </div>
            <table class="table-music">
                @php
                    $count = 1;
                @endphp
                <tr>
                    <th>N°</th>
                    <th>Faixa</th>
                    <th>Duração</th>
                </tr>
                @foreach(\App\Models\Music::query()->where('album_id', $album->id)->get() as $music)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $music->name }}</td>
                        <td>3:47</td>
                    </tr>
                    @php
                        $count++;
                    @endphp
                @endforeach
            </table>
        </div>
    @endforeach
@endsection
