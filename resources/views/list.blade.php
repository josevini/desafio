@extends('home')

@section('content')
    <form class="search" method="get" action="{{ route('list') }}">
        <input class="input-search" type="text" placeholder="Digite uma palavra chave" name="search_value" />
        <input class="submit" value="Procurar" type="submit" />
    </form>
    <a class="btn" href="{{ route('form-new-album') }}">
        novo álbum
    </a>
    <a class="btn" href="{{ route('form-new-music') }}">
        nova música
    </a>
    <a class="btn" href="{{ route('manage') }}">
        gerenciar
    </a>
    @foreach($albums as $album)
        <div class="listing">
            <div class="div-album">
                <h2 class="album-name">Álbum: {{ $album->name }}, {{ $album->date }}</h2>
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
                @foreach($musics as $music)
                    @if($music->album_id == $album->id)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $music->name }}</td>
                            <td>{{ number_format($music->duration / 60, 2, ':') }}</td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endif
                @endforeach
            </table>
        </div>
    @endforeach
@endsection
