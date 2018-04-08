@extends('layouts.master-auth')

@section('title')
    Login | BookSeller
@endsection
@section('content')
    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            <div class="row">
                <div class="input-field col s12 center">
                    <img src="{{URL::asset('/images/logo/login-logo.png')}}" alt="" class="circle responsive-img valign profile-image-login">
                    <p class="center login-form-text">Su acceso fue bloqueado, contáctese con administración.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_content')
    <script>
        $(document).ready(function() {
            Materialize.updateTextFields();
        });
    </script>
@endsection
