@extends('template.index')

@section('content')

<div class="container text-center">

    <h1 class="display-4 py-2">Lista de Serviços</h1>
  
    <a href="{{ route('passwords.create') }}" class="btn btn-success">Adicionar Serviço</a>

<table class="table my-4">
    <thead>
    <tr>
        <th>
            Serviço
        </th>
        <th>
            Conta
        </th>
        <th>
            Login
        </th>

        <th>
            Senha
        </th>

        <th>
            Ações
        </th>
    </tr>
</thead>
<tbody>
    @forelse ($password as $details)
    <tr>
        <td>
            {{ $details->service }}
        </td>
        <td>
            {{ $details->account }}
        </td>
        <td>
            {{ $details->login }}
        </td>
        <td>
            {{ $details->password }}
        </td>
        <td>
            <a href="{{ route('passwords.edit', $details) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('passwords.destroy', $details) }}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Confirma esta exclusão?')">Excluir</button>
        </form>
        </td>
    </tr> 
    @empty

    <tr>
        <td colspan="5">
           Nenhum registro encontrado.
        </td>

    </tr>        
    @endforelse

</tbody>
</table>

@if ($password->count())
        {{ $password->links() }}
        {{ Session::flash('token') }}
@endif
</div>

@endsection