@extends('layouts.adminLayout.admin_design')
@section('content')
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="" class="tip-bottom"><i class="icon-home"></i></a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <div class="quick-actions_homepage">
            <ul class="quick-actions">

            </ul>
        </div>
        <!--End-Action boxes-->

        <!--Chart-box-->
        <div class="row-fluid">
            <div class="widget-box">
                <table class="table table-active" >
                    <thead >
                        <th> Id</th>
                        <th> Nombre</th>
                        <th> Correo</th>
                    </thead>
                    <tbody class="table-bordered" >
                        @foreach($users as $user)
                        <tr>
                            <td >{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          <hr />

        </div>
    </div>

    <!--end-main-container-part-->
    @endsection
