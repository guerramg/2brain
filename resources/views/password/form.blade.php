@extends('template.index')

@section('content')

<div class="accountiner text-center py-3">
<!-- VERIFICAR SE ESTOU EDITANDO OU CADASTRANDO -->
@if (isset($password))
  <h1>Editar Serviço</h1>
@else
  <h1>Criar Serviço</h1>
@endif

<!-- VERIFICAR SE ESTOU EDITANDO OU CADASTRANDO -->
@if (isset($password))
    <form action="{{ route('passwords.update', $password) }}" method="post">
    @method('PUT')
@else
    <form action="{{ route('passwords.store') }}" method="post">

@endif

    @csrf

<div class="mb-3">
  <label for="service" class="form-label">Serviço</label>
  <input type="text" class="form-control" name="service" placeholder="Entre com seu serviço" value="{{ old('service') ?? @$password->service }}">
  <small id="helpId" class="form-text text-muted">Escreve o service do serviço.</small>
  @error('service')
      <p class="form-text text-danger">{{ $message }}</p>
  @enderror
</div>

<div class="mb-3">
  <label for="account" class="form-label">Conta</label>
  <input type="text" class="form-control" name="account" placeholder="Entre com os dados da conta" value="{{ old('account') ?? @$password->account  }}">
  <small id="helpId" class="form-text text-muted">Entre com o dados da account.</small>
  @error('account')
  <p class="form-text text-danger">{{ $message }}</p>
@enderror

</div>

<div class="mb-3">
  <label for="login" class="form-label">Login</label>
  <input type="text" class="form-control" name="login" placeholder="Entre com o login" value="{{ old('login') ?? @$password->login  }}">
  <small id="helpId" class="form-text text-muted">Entre com os dados do login.</small>
  @error('login')
      <p class="form-text text-danger">{{ $message }}</p>
  @enderror
</div>

<div class="mb-3">
  <label for="password" class="form-label">Senha</label>
  <input type="text" class="form-control" name="password" placeholder="Entre com sua senha" value="{{ old('account') ?? @$password->password  }}">
  <small id="helpId" class="form-text text-muted">Entre com a password.</small>
  @error('password')
  <p class="form-text text-danger">{{ $message }}</p>
@enderror

</div>


<!-- VERIFICAR SE ESTOU EDITANDO OU CADASTRANDO -->
@if (isset($password))
    <button type="submit" class="btn btn-success">Editar</button>
@else
  <button type="submit" class="btn btn-success">Salvar</button>

@endif

</form>


</div>

@endsection