@extends('admin.template.Layout')
@section('title','Inicio de sesion')
@section('contenedor')
<div class="container top30"  >
    <div class="row ">
        <div class="col-md-8 col-md-offset-2 ">
            <div class="panel panel-default">
                
                <div class="panel-heading " ALIGN=center>Inicio de sesion</div>
                
                <div class="col-xs-12 col-xs-offset-4 " >

                  <IMG SRC="{{asset('img/logo.png')}}"  class="col-xs-8  col-sm-4 col-md-4 col-lg-4 "> 
                </div> 
                  <div class="panel-body">  

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">

                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Ingresar
                                </button>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
