@extends('home')

@section('content')
    <form method="post" action="{{ route('add-music')  }}">
        @csrf
        Nome da Música: <input type="text" name="name" required />
        Álbum: <select name="album">
            @foreach($albums as $album)
                <option value={{ $album->id }}>
                    {{ $album->name  }}
                </option>
            @endforeach
        </select>
        <input type="submit" value="Cadastrar">
        <a class="btn" href="{{ route('home') }}">
            voltar
        </a>
    </form>
@endsection
