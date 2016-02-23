@extends('layouts.master')

@section('title')

<title>Search Results</title>

@endsection

@section('css')

// your css

@endsection

@section('scripts')

// your javascript

@endsection

@section('content')
	<h2>Results</h2>
	@if (isset($stones)) 
		@foreach($stones as $stone)
			<div class="media">
				<div class="media-left media-middle">
					<a href="#">
						<img class="media-object" src="/images/stones/{{ $stone->img }}" alt="{{ $stone->name }}" width="100" height="100">
					</a>
				</div>
				<div class="media-body">
					<h3 class="media-heading">{{ $stone->name }}</h3>

					<strong>Anwendungsbereich : </strong>
					@foreach($stone->bodies as $body)
						 {{ $body->name }} 
					@endforeach

					<strong>Chakra :</strong>
					@foreach($stone->chakras as $chakra)
						<span style="color : {{$chakra->color}}"> {{ $chakra->name }} </span>
					@endforeach
					<br>

					<strong>Hilft gegen :</strong><br>
					@foreach($stone->diseases as $disease)
						{{$disease->name}}
					@endforeach
					<br>

					{{ $stone->description }}
					
				</div>
			</div>
	    @endforeach
    @else
    	<p>nichts gefunden</p>
    @endif

@stop
