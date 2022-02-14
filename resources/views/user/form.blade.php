@extends('template.index')

@section('content')

<div class="container text-center py-3">
<!-- VERIFICAR SE ESTOU EDITANDO OU CADASTRANDO -->
@if (isset($user))
  <h1>Editar Usuário</h1>
@else
  <h1>Criar Usuário</h1>
@endif

<!-- VERIFICAR SE ESTOU EDITANDO OU CADASTRANDO -->
@if (isset($user))
    <form action="{{ route('users.update', $user) }}" method="post">
    @method('PUT')
@else
    <form action="{{ route('users.store') }}" method="post">

@endif

    @csrf

<div class="mb-3">
  <label for="name" class="form-label">Nome</label>
  <input type="text" class="form-control" name="name" placeholder="Entre com seu nome" value="{{ old('name') ?? @$user->name }}">
  <small id="helpId" class="form-text text-muted">Escreve seu nome e sobrenome.</small>
  @error('name')
      <p class="form-text text-danger">{{ $message }}</p>
  @enderror
</div>

<div class="mb-3">
  <label for="cpf" class="form-label">CPF</label>
  <input type="number" class="form-control" name="cpf" placeholder="xxx xxx xxx xx" value="{{ old('cpf') ?? @$user->cpf  }}">
  <small id="helpId" class="form-text text-muted">Entre com seu cpf sem pontos e traços.</small>
  @error('cpf')
  <p class="form-text text-danger">{{ $message }}</p>
@enderror

</div>

<div class="mb-3">
  <label for="phone" class="form-label">Telefone</label>
  <input type="number" class="form-control" name="phone" placeholder="xx xxxxx xxxx" value="{{ old('phone') ?? @$user->phone  }}">
  <small id="helpId" class="form-text text-muted">Entre com seu telefone sem caracteres especiais.</small>
  @error('phone')
  <p class="form-text text-danger">{{ $message }}</p>
@enderror
</div>

<div class="mb-3">
  <label for="email" class="form-label">Email</label>
  <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="xx@xx.com.br"  value="{{ old('email') ?? @$user->email  }}">
  <small id="emailHelpId" class="form-text text-muted">Entre com seu email.</small>
  @error('email')
  <p class="form-text text-danger">{{ $message }}</p>
@enderror
</div>

  <div class="mb-3">
    <label for="login" class="form-label">Login</label>
    <input type="text" class="form-control" name="login" placeholder="Entre com seu login" value="{{ old('login') ?? @$user->login  }}">
    <small id="helpId" class="form-text text-muted">Entre com seu login, até 35 caracteres.</small>
    @error('login')
    <p class="form-text text-danger">{{ $message }}</p>
@enderror
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Senha</label>
    <input type="password" class="form-control" name="password" placeholder="entre com sua senha">
    <input type="hidden" name="status" value="0">
    <small id="helpId" class="form-text text-muted">Entre com sua senha alfanumérico.</small>
    @error('password')
    <p class="form-text text-danger">{{ $message }}</p>
@enderror
  </div>
<!-- VERIFICAR SE ESTOU EDITANDO OU CADASTRANDO -->
@if (isset($user))
    <button type="submit" class="btn btn-success">Editar</button>
@else
  <button type="submit" class="btn btn-success">Salvar</button>

@endif

</form>


</div>

@endsection