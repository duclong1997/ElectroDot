@extends('page_default/form_page')
@section('title')
    Sign up
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
<link type="text/css" rel="stylesheet" href="{{asset('css/css_Signup/Signup.css')}}"/>
@endsection

@section('content')
    <div class="form_signup" >
        <div class="form_head">
            <h1>SIGN UP ELECTRO.</h1>
        </div>
        <div class="form_body" >
            <table>
                <form method="POST" action="{{route('signiup')}}">
                        @csrf
                    <tr>
                        <th >
                            <label>User name:</label>
                        </th>
                        <th class="th_name" >
                            <input type="text" placeholder="Enter user name" name="user">
                        </th>
                    </tr>

                    <tr>
                        <th >
                            <label>Password:</label>
                        </th>
                        <th class="th_name" >
                            <input type="password" placeholder="Enter password" name="pass">
                        </th>
                    </tr>

                    <tr>
                        <th  >
                            <label>Pre-password:</label>
                        </th>
                        <th class="th_name">
                            <input type="password" placeholder="Enter user name" name="prePass">
                        </th>
                    </tr>
                    <tr>
                        <th class="th_name" >
                                <button type="reset" >Reset</button>
                        </th>
                        <th class="th_name" >
                            <button type="submit">Accept</button>
                        </th>
                    </tr>
                <form>
            </table>
        </div>
    </div>
@endsection

@section('content')


@endsection

@section('script')
    
@endsection
