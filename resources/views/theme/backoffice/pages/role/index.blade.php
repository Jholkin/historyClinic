@extends('theme.backoffice.layouts.admin')

@section('title', 'Roles del sistema')

@section('head')
@endsection

@section('content')
<div class="section">
<p class="caption"><strong>Roles del sistema:</strong></p>
    <div class="divider"></div>
    <div id="basic-form" class="section">
        <div class="row">
          <div class="col s12">
            <div class="card-panel">
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
                        @foreach ($roles as $role)
                            <tr>
                                <td><a href="{{route('backoffice.role.show', $role)}}">{{$role->name}}</a></td>
                                <td>{{$role->slug}}</td>
                                <td>{{$role->description}}</td>
                                <td><a href="{{route('backoffice.role.edit', $role)}}">Editar</a></td>
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
@endsection

@section('foot')
@endsection