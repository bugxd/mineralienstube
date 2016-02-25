@extends('layouts.master')

@section('title')

<title>Finde deinen Stein</title>

@endsection

@section('css')

img {
	max-width: 100%;
	height: auto;
}
.img-responsive#Kronenchakra {
	background-color: #990066 !important;
	font-family:'Mv Boli' !important;
}


@endsection

@section('scripts')


@endsection

@section('content')
	<h2>Finde Deinen Stein</h2>

	<img class="img-responsive" src="/images/findYstone/aura.jpg" max-width="500" max-hight="500" alt = "Maennchen" usemap="#Maennchen">
	
		<map name="Maennchen">					
			<area id="Kronenchakra" shape="circle" coords="159,31, 15" href="{{ URL::route('stones-search-param', 'Kronen- oder Scheitelchakra') }}"
			alt="Kronen- oder Scheitelchakra" title="Kronenchakra">
			<area id="Stirnchakra" shape="circle" coords="208,65,15" href="{{ URL::route('stones-search-param', 'Stirnchakra oder Drittes Auge') }}"
			alt="Stirnchakra oder Drittes Auge" title="Stirnchakra">
			<area id="Halschakra" shape="circle" coords="78,118,19" href="{{ URL::route('stones-search-param', 'Hals- oder Kehlchakra') }}"
			alt="Halschakra" title="Halschakra">
			<area id="Herzchakra" shape="circle" coords="274,170,17" href="{{ URL::route('stones-search-param', 'Herzchakra') }}"
			alt="Herzchakra" title="Herzchakra">
			<area id="Solarplexuschakra" shape="circle" coords="262,236,15" href="{{ URL::route('stones-search-param', 'Nabel- oder Solarplexuschakra') }}"
			alt="Solarplexuschakra" title="Solarplexuschakra">
			<area id="Sakralchakra" shape="circle" coords="50,286,16" href="{{ URL::route('stones-search-param', 'Sakral- oder Sexualchakra') }}"
			alt="Sakralchakra" title="Sakralchakra">
			<area id="Wurzelchakra" shape="circle" coords="255,306,16" href="{{ URL::route('stones-search-param', 'Wurzel- oder Basischakra') }}"
			alt="Wurzelchakra" title="Wurzelchakra">
			
			<area id="Kopf" shape="rect" coords="136,69,185,91" href="{{ URL::route('stones-search-param', 'Kopf') }}" alt="Kopf">
			<area id="Hals" shape="rect" coords="173,112,215,132" href="{{ URL::route('stones-search-param', 'Hals') }}" alt="Hals">
			<area id="Gelenke" shape="rect" coords="39,154,114,175" href="{{ URL::route('stones-search-param', 'Gelenke') }}" alt="Gelenke">
			<area id="Brust" shape="rect" coords="133,172,188,191" href="{{ URL::route('stones-search-param', 'Brust') }}" alt="Brust">
			<area id="Bauch" shape="rect" coords="133,241,190,261," href="{{ URL::route('stones-search-param', 'Bauch') }}" alt="Bauch">
			<area id="Beine" shape="rect" coords="134,344,185,363" href="{{ URL::route('stones-search-param', 'Beine') }}" alt="Beine">
			
		</map>
@stop
