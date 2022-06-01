@extends('home')

@section('content')
    <form method="post" action="{{ route('add-album')  }}">
        @csrf
        Nome: <input type="text" name="name" required />
        Data: <input type="number" min="1900" max="2099" value="{{date('Y')}}" name="date" required/>
        <input type="submit" value="Cadastrar">
    </form>
@endsection
