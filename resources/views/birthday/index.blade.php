@extends('template.index')

@section('content')

<div class="container text-center">

    <h1 class="display-4 py-2">Lista de Aniversários</h1>
  
    <a href="{{ route('birthdays.create') }}" class="btn btn-success">Adicionar Aniversário</a>
@if (Session::has('mensagem')) 
    <div class="alert alert-info my-5">
        {{Session::get('mensagem')}}
    </div>
@endif

<table class="table my-4">
    <thead>
    <tr>
        <th>
            Nome
        </th>
        <th>
            Dia
        </th>
        <th>
            Mês
        </th>
        <th>
            Ações
        </th>
    </tr>
</thead>
<tbody>
    @forelse ($birthday as $details)
    <tr>
        <td>
            {{ $details->name }}
        </td>
        <td>
            {{ $details->day }}
        </td>
        <td>
            {{ $details->month }}
        </td>
        <td>
            <a href="{{ route('birthdays.edit', $details) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('birthdays.destroy', $details) }}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Confirma esta exclusão?')">Excluir</button>
        </form>
        </td>
    </tr> 
    @empty

    <tr>
        <td colspan="4">
           Nenhum registro encontrado.
        </td>

    </tr>        
    @endforelse

</tbody>
</table>

@if ($birthday->count())
        {{ $birthday->links() }}
@endif
</div>

@endsection