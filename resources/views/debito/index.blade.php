@extends('template.index')

@section('content')

<div class="container text-center">

    <h1 class="display-4 py-2">Lista de Débitos</h1>
  
    <a href="{{ route('debitos.create') }}" class="btn btn-success">Adicionar Débito</a>
@if (Session::has('mensagem')) 
    <div class="alert alert-info my-5">
        {{Session::get('mensagem')}}
    </div>
@endif

<table class="table my-4">
    <thead>
    <tr>
        <th>
            Vencimento
        </th>
        <th>
            Descrição
        </th>
        <th>
            Valor
        </th>
        <th>
            Ações
        </th>
    </tr>
</thead>
<tbody>
    @forelse ($debito as $details)
    <tr>
        <td>
            {{ date('d/m/Y', strtotime($details->vencimento)) }}
        </td>
        <td>
            {{ $details->descricao }}
        </td>
        <td>
            R$ {{ number_format($details->valor, '2', ',', '.') }}
        </td>
        <td>
            <a href="{{ route('debitos.edit', $details) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('debitos.destroy', $details) }}" method="post" class="d-inline">
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

@if ($debito->count())
        {{ $debito->links() }}
@endif
</div>

@endsection