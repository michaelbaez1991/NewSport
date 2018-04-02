@extends('layouts.app')

@section('title')

@section('sidebar')
	@parent
@endsection

@section('body')
	<div class="container text-center">    
		<h1>{{ $posts->name }}</h1>
	        <div class="card text-center">
	        	@php
					$conteo = count($posts->category->name);
					//echo $conteo;
					$i = 1;
				@endphp
			  	<div class="card-header text-left">
			  		<u>Categoría</u>: 
			    	<a href="{{ route('categoryslug', $posts->category->slug) }}">
			    		<i>#{{ $posts->category->name }}</i>
			    	</a>
			    	@if ($i < $conteo)
						{{ ',' }}
					@else
						{{ '' }}
					@endif
			  	</div> 
			  	<div class="card-body">
			  		@if($posts->file)
			  			<img src="{{ $posts->file }}" style="width:100%;" class="img-responsive">
			  		@endif
					<i>{{ $posts->excerpt }}</i>
					
					<hr>
					<p>{{ $posts->body }}</p>

					<blockquote class="blockquote text-right">
					  <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
					</blockquote>
					<hr>
					
					<div class="text-right">
						Etiquetas: 
						@php
							$conteo = count($posts->tags);
							//echo $conteo;
							$i = 1;
						@endphp

						@foreach( $posts->tags as $tag)
							<a href="{{ route('tagslug', $tag->slug) }}">
								<u>{{$tag->name}}</u>
							</a>
							@if ($i < $conteo)
								{{ ',' }}
							@else
								{{ '' }}
							@endif
							@php
								$i++;
							@endphp
						@endforeach
					</div>
			  	</div>
			  	<div class="card-footer text-muted">
			    	hace 2 días
			  	</div>
			</div>
    </div>
@endsection

@section('footer')
	@parent
@endsection