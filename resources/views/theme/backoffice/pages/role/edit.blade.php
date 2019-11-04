@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar rol: ' . $role->name)

@section('head')
@endsection

@section('content')
    <div class="section">
        <p class="caption">Edición del rol: {{$role->name}}</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
              <div class="col s12 m8 offset-m2">
                <div class="card-panel">
                  <h4 class="header2">Editar Rol</h4>
                  <div class="row">
                  <form class="col s12" method="POST" action="{{ route('backoffice.role.update', $role) }}">
                    <!--nos devuleve un input con el token de sesión-->
                    {{ csrf_field() }}

                    {{ method_field('PUT')}}

                      <div class="row">
                        <div class="input-field col s12">
                            <input id="name" type="text" name="name" value="{{$role->name}}">
                            <label for="name">Nombre del rol</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s12">
                          <textarea id="description" class="materialize-textarea" name="description">{{$role->description}}</textarea>
                          <label for="description">Descripción</label>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <button class="btn waves-effect waves-light right" type="submit">Actualizar
                              <i class="material-icons right">send</i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection

@section('foot')
@endsection