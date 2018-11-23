@extends('layouts.adminLayout.admin_design')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="#">Form elements</a> <a href="#" class="current">Validation</a> </div>
        <h1>Configuración</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Cambiar contraseña</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{url('/actualizarpass')}}" name="password_validate" id="password_validate"
                            novalidate="novalidate">
                            @csrf
                            <div class="control-group">
                                <label class="control-label">Contraseña antigua</label>
                                <div class="controls">
                                    <input type="password" name="pwd" id="pwd" />
                                    <span id="checkpass"></span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Nueva Contraseña</label>
                                <div class="controls">
                                    <input type="password" name="nueva_pwd" id="nueva_pwd" />
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Repetir Contraseña</label>
                                    <div class="controls">
                                        <input type="password" name="confirmar_pwd" id="confirmar_pwd" />
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Update Password" class="btn btn-success">
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