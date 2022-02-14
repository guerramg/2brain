@extends('template.index')

@section('content')

<div class="container text-center">

    <h1 class="alert alert-danger my-5">Digite o Token de Acesso</h1>
  
<table class="table my-4">
    <thead>
    <tr>
        <th>
           
        </th>
    </tr>
</thead>
<tbody>

    <tr>
        <td>
            <form action="{{ route('passwords.store') }}" method="post" class="d-inline">
                <input type="password" name="token" class="form-control" autocomplete="off">
            @csrf
            <button type="submit" class="btn btn-danger my-2" >Verificar</button>
        </form>
        </td>
    </tr> 

</tbody>
</table>
@error('token')
<p class="form-text text-danger">{{ $message }}</p>
@enderror
@if (Session::has('mensagem')) 
    <div class="alert alert-info my-5">
        {{Session::get('mensagem')}}
    </div>
@endif
</div>

@endsection