@extends('home')

@section('content')
    <form method="post" action="{{ route('add-album')  }}">
        @csrf
        Nome da Música: <input type="text" name="name" required />
        Álbum: <select>
            @foreach($albums as $album)
                <option value={{ $album->id }}>
                    {{ $album->name  }}
                </option>
            @endforeach
        </select>
        <input type="submit" value="Cadastrar">
    </form>
@endsection
