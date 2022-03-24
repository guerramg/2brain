@extends('template.index')

@section('content')

<div class="container text-center py-3">
<!-- VERIFICAR SE ESTOU EDITANDO OU CADASTRANDO -->
@if (isset($birthday))
  <h1>Editar Aniversário</h1>
@else
  <h1>Criar Aniversário</h1>
@endif

<!-- VERIFICAR SE ESTOU EDITANDO OU CADASTRANDO -->
@if (isset($birthday))
    <form action="{{ route('birthdays.update', $birthday) }}" method="post">
    @method('PUT')
@else
    <form action="{{ route('birthdays.store') }}" method="post">

@endif

    @csrf

<div class="mb-3">
  <label for="name" class="form-label">Nome</label>
  <input type="text" class="form-control" name="name" placeholder="Entre com seu nome" value="{{ old('name') ?? @$birthday->name }}">
  <small id="helpId" class="form-text text-muted">Escreve seu nome e sobrenome.</small>
  @error('name')
      <p class="form-text text-danger">{{ $message }}</p>
  @enderror
</div>

<div class="mb-3">
  <label for="day" class="form-label">Dia</label>
  <input type="number" class="form-control" name="day" placeholder="xx" max="31" value="{{ old('day') ?? @$birthday->day  }}">
  <small id="helpId" class="form-text text-muted">Entre com o dia do aniversáriante.</small>
  @error('day')
  <p class="form-text text-danger">{{ $message }}</p>
@enderror

</div>

<div class="mb-3">
  <label for="month" class="form-label">Mês</label>
  <input type="number" class="form-control" name="month" placeholder="xx" max="12" value="{{ old('month') ?? @$birthday->month  }}">
  <small id="helpId" class="form-text text-muted">Entre com o mês do aniversáriante.</small>
  @error('month')
      <p class="form-text text-danger">{{ $message }}</p>
  @enderror
</div>

<!-- VERIFICAR SE ESTOU EDITANDO OU CADASTRANDO -->
@if (isset($birthday))
    <button type="submit" class="btn btn-success">Editar</button>
@else
  <button type="submit" class="btn btn-success">Salvar</button>

@endif

</form>


</div>
@endsection