@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
        <h1>Crear Administrador</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Información</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{ route("cuentas.store") }}" name="crear_admin"
                            id="crear_admin" novalidate="novalidate">
                            @csrf
                            <div class="control-group">
                                <label class="control-label">Nombre</label>
                                <div class="controls">
                                    <input type="text" name="nombre" id="nombre" class="from-control" />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Correo</label>
                                <div class="controls">
                                    <input type="email" name="email" id="email" />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Contraseña</label>
                                <div class="controls">
                                    <input type="password" name="pwd" id="pwd" />
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Repetir Contraseña</label>
                                    <div class="controls">
                                        <input type="password" name="confirmar_pwd" id="confirmar_pwd" />
                                    </div>

                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Crear" class="btn btn-success">
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection