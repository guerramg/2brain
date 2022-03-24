@extends('template.index')

@section('content')

<div class="container text-center py-3">
<!-- VERIFICAR SE ESTOU EDITANDO OU CADASTRANDO -->
@if (isset($debito))
  <h1>Editar Débito</h1>
@else
  <h1>Criar Débito</h1>
@endif

<!-- VERIFICAR SE ESTOU EDITANDO OU CADASTRANDO -->
@if (isset($debito))
    <form action="{{ route('debitos.update', $debito->id) }}" method="POST">
    @method('PUT')
@else
    <form action="{{ route('debitos.store') }}" method="post">

@endif

    @csrf
    <div class="mb-3">
      <label for="favorecido" class="form-label">Favorecido</label>
      <input type="text" class="form-control" name="favorecido" placeholder="Quem é o favorecido?" value="{{ old('favorecido') ?? @$debito->favorecido  }}">
      @error('favorecido')
      <p class="form-text text-danger">{{ $message }}</p>
    @enderror
    </div> 

    <div class="mb-3">
      <label for="vencimento" class="form-label">Vencimento</label>
      <input type="date" class="form-control" name="vencimento" value="{{ old('vencimento') ?? @$debito->vencimento  }}">
      @error('vencimento')
      <p class="form-text text-danger">{{ $message }}</p>
    @enderror
    </div> 

    <div class="mb-3">
      <label for="valor" class="form-label">Valor</label>
      <input type="number" class="form-control" name="valor" step="any" value="{{ old('valor') ?? @$debito->valor  }}">
      @error('valor')
      <p class="form-text text-danger">{{ $message }}</p>
    @enderror
    
    </div> 
    
    @if (isset($debito))

    <div class="mb-3">
      <label for="date" class="form-label">Data de Pagamento</label>
      <input type="date" class="form-control" name="dpgto" value="{{ old('dpgto') ?? @$debito->dpgto  }}">
    
    </div>
       
    @endif

<div class="mb-3">
  <label for="descricao" class="form-label">Descrição</label>
  <textarea name="descricao" class="form-control" cols="30" rows="10" placeholder="Entre com os dados do débito">{{ old('descricao') ?? @$debito->descricao }}</textarea>
  @error('descricao')
      <p class="form-text text-danger">{{ $message }}</p>
  @enderror
</div>

<!-- VERIFICAR SE ESTOU EDITANDO OU CADASTRANDO -->
@if (isset($debito))
    <button type="submit" class="btn btn-success">Editar</button>
@else
  <button type="submit" class="btn btn-success">Salvar</button>

@endif

</form>
</div>
@endsection