@extends('home')

@section('content')
    <form method="post" action="{{ route('add-music')  }}" class="form-new">
        @csrf
        Nome da Música: <input type="text" name="name" required />
        Álbum: <select name="album">
            @foreach($albums as $album)
                <option value={{ $album->id }}>
                    {{ $album->name  }}
                </option>
            @endforeach
        </select>
        Duração (segundos) <input type="number" name="duration" required>
        <input type="submit" value="Cadastrar">
    </form>
    <a class="btn" href="{{ route('home') }}">
        voltar
    </a>
@endsection
