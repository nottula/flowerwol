@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
		<div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
				<div class="row">
		    		@foreach ($pcs as $pc)
				<div class="card mx-auto col-lg-2 col-sm-4 col-md-4 col-xs-8 col-8" style="margin-top: 2px; margin-left: 10px;">
					<img class="card-img-top" src="img/pc.png" height="100" width="100">
					<div class="card-body" align="center">
    						<h5 class="card-title">{{$pc->id}}</h5>
    						<p class="card-text"><strong>{{$pc->nome}}</strong> </br> {{$pc->indirizzoIp}}</p>
    						<a href="/verificaPcWeb/{{$pc->id}}" class="btn btn-primary">Accendi</a>
  					</div>
				</div>
				@endforeach
			</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
