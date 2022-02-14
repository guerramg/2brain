@extends('template.index')

@section('content')

<div class="container text-center py-3">
<!-- VERIFICAR SE ESTOU EDITANDO OU CADASTRANDO -->
@if (isset($sticky))
  <h1>Editar Lembrete</h1>
@else
  <h1>Criar Lembrete</h1>
@endif

<!-- VERIFICAR SE ESTOU EDITANDO OU CADASTRANDO -->
@if (isset($sticky))
    <form action="{{ route('stickies.update', $sticky) }}" method="post">
    @method('PUT')
@else
    <form action="{{ route('stickies.store') }}" method="post">

@endif

    @csrf
    <div class="mb-3">
      <label for="date" class="form-label">Data</label>
      <input type="date" class="form-control" name="date" value="{{ old('date') ?? @$sticky->date  }}">
      <small id="helpId" class="form-text text-muted">Entre com o dia do lembrete.</small>
      @error('date')
      <p class="form-text text-danger">{{ $message }}</p>
    @enderror
    
    </div>

<div class="mb-3">
  <label for="sticky" class="form-label">Lembrete</label>
  <textarea name="sticky" class="form-control" cols="30" rows="10" placeholder="Entre com seu lembrete">{{ old('sticky') ?? @$sticky->sticky }}</textarea>
  <small id="helpId" class="form-text text-muted">Escreve o lembrete.</small>
  @error('sticky')
      <p class="form-text text-danger">{{ $message }}</p>
  @enderror
</div>

<!-- VERIFICAR SE ESTOU EDITANDO OU CADASTRANDO -->
@if (isset($sticky))
    <button type="submit" class="btn btn-success">Editar</button>
@else
  <button type="submit" class="btn btn-success">Salvar</button>

@endif

</form>


</div>

@endsection