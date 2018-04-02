@extends('layouts.app')
{{-- @section('title', 'NewSportKing') --}}
@section('title')

@section('sidebar')
    @parent
@endsection

@section('body')
	{{-- @if(Auth::user()->hasRole('admin'))
	    <div>Acceso como administrador</div>
	@elseif(Auth::user()->hasRole('user'))
	    <div>Acceso como usuario</div>
	@else
	    <div>Acceso como invictado</div>
	@endif --}}
@endsection

@section('footer')
    @parent
@endsection