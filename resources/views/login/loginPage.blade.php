@extends('page_default/form_page')
@section('title')
    Sign in
@endsection
@section('account')
   @if (!session()->has('account'))
        <a href="{{asset('/login/')}}"> 
            <i class="fa fa-user-o"></i> 
            Sign in  
        </a>
    @else
        <a href="{{asset('/profile/')}}">
            <i class="fa fa-user-o"></i> 
            {{session('account')}}
        </a>
    @endif
@endsection

@section('money')
    @if ( !session()->has('money'))
    <a href="{{asset('/login/')}}"> 
        <i class="fa fa-dollar"></i>
        0 USD
    </a>
    @else
    <a href="{{asset('/profile/')}}">
        <i class="fa fa-dollar"></i>
        {{session('money')}}
     </a>
    @endif    
@endsection

@section('css')
<link type="text/css" rel="stylesheet" href="{{asset('css/css_Login/Login.css')}}"/>
@endsection


@section('content')
    {{-- sign in --}}
<div class="sign_in" >
     {{-- header sign in --}}
    <div class="Sign_in_head">
        <h1>Wellcome to Electro. </h1>
    </div>
     {{-- sign in body --}}
    <div class="sign_in_body" >
        <div class="form1">
            <div>
                <h1>SIGN IN</h1>
            </div>
            <div class="fom1_sign_in">
            <form action="{{route('check')}}" method="POST">
                    @csrf
                    <label >
                        User name:
                    </label>
                    <br/>
                    <input type="text" name="user" id="user">
                    <br/>
                    <label >
                        Password:
                    </label>
                    <br/>
                    <input type="password" name="pass" id="pass">
                    <br/>
                    @if (!empty($log))
                      <b>{{$log}}</b>
                    @endif
                    <br/>
                    <button type="reset" class="reset_sign_in" >Reset</button>
                    <button type="submit" class="submit_sign_in" >Sign in</button>
            </div>
            <div class="forget" >
                <a href="#" >   Forgot your password?	</a>
            </div>
        </div>
         {{-- sign up --}}
       <div class="form2">
            <div>
                <h1>SIGN UP</h1>
            </div>
            {{-- content sign up --}}
            <div class="content_sign_up" >
                    A new free account
                    <br/>
                    It's free to join and easy to use. Continue on to create your ElectroDot account and get ElectroDot, the leading digital solution for PC and Mac gamers.
            </div>
            <div class="button_sign_up" >
            <button type="button" >
            <a href="{{asset('/signup')}}" >Sign up</a>
            </button>
            </div>
        </div>
        <div class="form3" >
            <div>
                <h1>SIGN IN WITH</h1>
            </div>
            <div class="sign_in_with">
                <a href="https://www.facebook.com/v2.5/dialog/oauth?app_id=1780481245506288&channel_url=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fvy-MhgbfL4v.js%3Fversion%3D44%23cb%3Df7b0dd548a1494%26domain%3Dcomicvn.net%26origin%3Dhttps%253A%252F%252Fcomicvn.net%252Ff3505c819e440c4%26relation%3Dopener&client_id=1780481245506288&display=popup&domain=comicvn.net&e2e=%7B%7D&fallback_redirect_uri=https%3A%2F%2Fcomicvn.net%2F&locale=vi_VN&origin=1&redirect_uri=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fvy-MhgbfL4v.js%3Fversion%3D44%23cb%3Df5ce60892fa4ec%26domain%3Dcomicvn.net%26origin%3Dhttps%253A%252F%252Fcomicvn.net%252Ff3505c819e440c4%26relation%3Dopener%26frame%3Df283ba16dc107e&response_type=token%2Csigned_request&sdk=joey&version=v2.5">
                    <img src="{{asset('img/img-core/facebook_sign_in.png')}}" class="face"/>
                </a>
                <br/>
                <br/>
                <a href="https://accounts.google.com/signin/oauth/oauthchooseaccount?client_id=604473813217-6do8l8v61lg8sab4cm08c0h5pqerncf4.apps.googleusercontent.com&as=_q-eHz32knfr23IgPb0K1g&destination=http%3A%2F%2Fcms.fpt.edu.vn&approval_state=!ChRoQmV4dmpqb0tOM05icjBabl9LQhIfYzBzLUgyc2EtMklWNEJxcmlYbTVkb25TVmJXdmpCWQ%E2%88%99AJDr988AAAAAXF49324_AFnZk5mdRMTK-nXZbFkVDvpU&oauthgdpr=1&xsrfsig=ChkAeAh8T01542WmHhm0C5i64NTaE5XYUgQhEg5hcHByb3ZhbF9zdGF0ZRILZGVzdGluYXRpb24SBXNvYWN1Eg9vYXV0aHJpc2t5c2NvcGU&flowName=GeneralOAuthFlow">
                   <img src="{{asset('img/img-core/google_sign_in.png')}}" class="google"/>
                </a>
            </div>
        </div>
    </div>
</div>
      
@endsection

@section('script')
@endsection

