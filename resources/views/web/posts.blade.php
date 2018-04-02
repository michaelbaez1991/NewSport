@extends('layouts.app')
{{-- @section('title', 'NewSportKing') --}}
@section('title')

@section('sidebar')
    @parent
@endsection

@section('body')
    <!-- Main Content -->
    <div class="container">            
        {{-- Sesion de noticias y ultimos post --}}
        <div class="card-columns">
            @foreach($posts as $post)
                <a href="{{ route('postslug', $post->slug) }}" style="color:#090909;">
                    <div class="card text-center">
                        {{-- Post con imagenes --}}
                        @if( $post->file)
                            <img class="card-img-top img-responsive" src="{{ $post->file }}">
                        {{-- Post sin imagenes --}}
                        @else
                        @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->name }}</h5>
                                <p class="card-text">{{ substr($post->excerpt, 0, 100) }}...</p>                    
                            </div>
                            <div class="card-footer bg-transparent border-secondary">                       
                                <small class="text-muted text-left">
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <i class="far fa-heart fa-1x"></i>  
                                        </a>
                                        2
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <i class="far fa-comment fa-1x"></i>  
                                        </a>
                                        3
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <i class="fas fa-eye fa-1x"></i>  
                                        </a>
                                        9
                                    </li>
                                </small>
                            </div>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- Nav de paginacion --}}
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{ $posts->render() }}
             </ul>
        </nav>
    </div>
    <hr>
@endsection

@section('footer')
    @parent
@endsection