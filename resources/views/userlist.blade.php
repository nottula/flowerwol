@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
		<div class="card-header">Gestione Utenti</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
				<div class="row">
				@foreach ($users as $user)
				@if ($logged->name != "flowerwol" && $user->name == "flowerwol")

				@elseif ($logged->name == "flowerwol" || $logged->name == $user->name)
				<div class="card mx-auto col-lg-2 col-sm-4 col-md-4 col-xs-8 col-8" style="margin-top: 2px; margin-left: 10px;">
					<img class="card-img-top" src="img/user.PNG" width="500" height="100">
					<div class="card-body" align="center">
						<p class="card-text"><strong>{{$user->name}}</strong>
						<!--<p class="card-text"><strong>{{$user->email}}</strong>-->
						<div>
							<button class="btn btn-primary col-12"><a href="/changePassword/{{$user->id}}" style="color: white;">Password</a></button>
							@if ($user->name != "flowerwol" && $logged->name == "flowerwol")
							<button class="btn btn-danger col-12" style="margin-top: 5px"><a href="/removeUser/{{$user->id}}" style="color: white;"> Rimuovi </a></button>
							@endif
						</div>
  					</div>
				</div>
				@endif
				@endforeach
				@if ($logged->name === "flowerwol")
				<div class="card mx-auto col-lg-2 col-sm-4 col-md-4 col-xs-8 col-8" style="margin-top: 2px; margin-left: 10px;">
                                        <img class="card-img-top" src="img/user.PNG" width="500" height="100">
                                        <div class="card-body" align="center">
                                                <p class="card-text"><strong>Nuovo Utente</strong>
                                                <div>
                                                        <button onclick="window.location.href='/createUser'" class="btn btn-success col-12">Crea</button>
                                                </div>
                                        </div>
				</div>
				@endif
			</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
