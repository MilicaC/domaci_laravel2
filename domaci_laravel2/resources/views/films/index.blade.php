@extends('films.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Svi filmovi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('films.create') }}"> Dodaj novi film</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Redni broj</th>
            <th>Naziv</th>
            <th>Opis</th>
            <th width="250px">Funkcije</th>
        </tr>
        @foreach ($films as $film)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $film->name }}</td>
            <td>{{ $film->description }}</td>
            <td>
                <form action="{{ route('films.destroy',$film->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('films.show',$film->id) }}">Prikaži</a>
    
                    <a class="btn btn-primary" href="{{ route('films.edit',$film->id) }}">Izmeni</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Obriši</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $films->links() !!}
      
@endsection