@extends('template.index')

@section('content')

<div class="container text-center">

    <h1 class="display-4 py-2">Lista de Lembretes</h1>
  
    <a href="{{ route('stickies.create') }}" class="btn btn-success">Adicionar Lembrete</a>
@if (Session::has('mensagem')) 
    <div class="alert alert-info my-5">
        {{Session::get('mensagem')}}
    </div>
@endif

<table class="table my-4">
    <thead>
    <tr>
        <th>
            Data
        </th>
        <th>
            Lembrete
        </th>
        <th>
            Ações
        </th>
    </tr>
</thead>
<tbody>
    @forelse ($stickies as $details)
    <tr>
        <td>
            {{ date('d/m/Y', strtotime($details->date)) }}
        </td>
        <td>
            {{ $details->sticky }}
        </td>
        <td>
            <a href="{{ route('stickies.edit', $details) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('stickies.destroy', $details) }}" method="post" class="d-inline">
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

@if ($stickies->count())
        {{ $stickies->links() }}
@endif
</div>

@endsection