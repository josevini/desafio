@extends('home')

@section('content')
    <form class="search" method="get" action="{{ route('search') }}">
        @csrf
        <input class="input-search" type="text" placeholder="Digite uma palavra chave" name="search_value" />
        <input class="submit" value="Procurar" type="submit" />
    </form>
    @foreach($albums as $album)
        <div class="listing">
            <h2 class="album-name">Álbum: {{ $album->name }}, 1961</h2>
            <table>
                <tr>
                    <th>N°</th>
                    <th>Faixa</th>
                    <th>Duração</th>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Minas Gerais</td>
                    <td>3:47</td>
                </tr>
            </table>
        </div>
    @endforeach
@endsection
