@extends('theme.backoffice.layouts.admin')

@section('title', 'Show')

@section('head')
@endsection

@section('breadcrumbs')
    {{-- <li><a href=""></a></li> --}}
  <li><a href="{{ route('backoffice.role.index') }}">Roles del sistema</a></li>
  <li>{{ $role->name }}</li>
@endsection

@section('content')
<div class="section">
<p class="caption"><strong>Rol:</strong> {{ $role->name }} </p>
    <div class="divider"></div>
    <div id="basic-form" class="section">
        <div class="row">
          <div class="col s12 m8 offset-m2">
            <div class="card">
              <div class="card-content">
                <span class="card-title">Usuarios con el rol de {{ $role->name }}</span>
                <div class="row">
                  <p><strong>Slug:</strong>{{$role->slug}}</p>
                  <p><strong>Descripción:</strong>{{$role->description}}</p>
                <div class="card-action">
                  <a href="{{ route('backoffice.role.edit', $role) }}">EDITAR</a>
                  <a href="#" style="color: red" onclick="enviar_formulario()">ELIMINAR</a>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col s12 m8 offset-m2">
            <div class="card">
              <div class="card-content">
                <span class="card-title">Permisos del rol {{ $role->name }}</span>
                <div class="row">
                  <table>
                    <thead>
                      <tr>
                          <th>Nombre</th>
                          <th>Slug</th>
                          <th>Descripción</th>
                          <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td><a href="{{route('backoffice.permission.show', $permission)}}">{{$permission->name}}</a></td>
                                <td>{{$permission->slug}}</td>
                                <td>{{$permission->description}}</td>
                                <td><a href="{{route('backoffice.role.show', $permission->role)}}">{{ $permission->role->name }}</a></td>
                                <td><a href="{{route('backoffice.permission.edit', $permission)}}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

<form method="POST" action="{{route('backoffice.role.destroy', $role)}}" name="delete_form">
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