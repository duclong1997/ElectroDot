@extends('page_default/form_page')
@section('title')
    Profile
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
@endsection

@section('content')
     ProfileUser
@endsection

@section('script')
@endsection