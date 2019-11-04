@extends('theme.backoffice.layouts.admin')

@section('title', $permission->name)

@section('head')
@endsection

@section('breadcrumbs')
    {{-- <li><a href=""></a></li> --}}
    <li><a href="{{ route('backoffice.role.index') }}">Roles del sistema</a></li>
    <li><a href="{{ route('backoffice.role.show', $permission->role) }}">{{$permission->role->name}}</a></li>
    <li>{{ $permission->name }}</li>
@endsection

@section('content')
<div class="section">
<p class="caption"><strong>Permiso:</strong> {{ $permission->name }} </p>
    <div class="divider"></div>
    <div id="basic-form" class="section">
        <div class="row">
          <div class="col s12 m8 offset-m2">
            <div class="card">
              <div class="card-content">
                <span class="card-title">Usuarios con el permiso de {{ $permission->name }}</span>
                <div class="row">
                  <p><strong>Slug:</strong>{{$permission->slug}}</p>
                  <p><strong>Descripción:</strong>{{$permission->description}}</p>
                <div class="card-action">
                  <a href="{{ route('backoffice.permission.edit', $permission) }}">EDITAR</a>
                  <a href="#" style="color: red" onclick="enviar_formulario()">ELIMINAR</a>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

<form method="POST" action="{{route('backoffice.permission.destroy', $permission)}}" name="delete_form">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
</form>

@endsection

@section('foot')
  <script>
    function enviar_formulario()
    {
      document.delete_form.submit();
    }
  </script>
@endsection