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

	<img class="img-responsive" src="/images/findYstone/aura.jpg" max-width="345" max-hight="345" alt = "Maennchen" usemap="#Maennchen">
	
		<map name="Maennchen">					
			<area id="Kronenchakra" shape="circle" coords="175,103, 12" href="{{ URL::route('stones-search-param', 'Kronenchakra') }}"
			alt="Kronenchakra" title="Kronenchakra">
			<area id="Stirnchakra" shape="circle" coords="214,130,12" href="http://www.earthangel-family.de/stirnchakra/"
			alt="Stirnchakra" title="Stirnchakra">
			<area id="Halschakra" shape="circle" coords="112,172,16" href="http://www.earthangel-family.de/halschakra/"
			alt="Halschakra" title="Halschakra">
			<area id="Herzchakra" shape="circle" coords="267,213,14" href="http://www.earthangel-family.de/herzchakra/"
			alt="Herzchakra" title="Herzchakra">
			<area id="Solarplexuschakra" shape="circle" coords="257,266,12" href="http://www.earthangel-family.de/solarplexus-chakra/"
			alt="Solarplexuschakra" title="Solarplexuschakra">
			<area id="Sakralchakra" shape="circle" coords="88,306,13" href="http://www.earthangel-family.de/sakralchakra/"
			alt="Sakralchakra" title="Sakralchakra">
			<area id="Wurzelchakra" shape="circle" coords="251,322,13" href="http://www.earthangel-family.de/wurzelchakra/"
			alt="Wurzelchakra" title="Wurzelchakra">
			
			<area id="Kopf" shape="rect" coords="156,132,192,151" href="http://www.earthangel-family.de/stirnchakra/" alt="Kopf">
			<area id="Lunge" shape="rect" coords="150,203,194,220" href="http://www.earthangel-family.de/herzchakra/" alt="Lunge">
			<area id="Magen" shape="rect" coords="147,246,196,263" href="http://www.earthangel-family.de/solarplexus-chakra/" alt="Magen">
			<area id="Bauch" shape="rect" coords="149,287,191,300" href="http://www.earthangel-family.de/solarplexus-chakra/" alt="Bauch">
			<area id="Gelenke" shape="rect" coords="144,381,200,395," href="http://www.earthangel-family.de/sakralchakra/" alt="Gelenke">
			<area id="Beine" shape="rect" coords="155,425,195,439" href="http://www.earthangel-family.de/wurzelchakra/" alt="Beine">
			
		</map>
@stop
