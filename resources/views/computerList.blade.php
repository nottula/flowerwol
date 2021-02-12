@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nome</th>
      <th scope="col">Indirizzo Mac</th>
      <th scope="col">Indirizzo Ip</th>
      <th scope="col">Elimina</th>
    </tr>
  </thead>
  <tbody>
@foreach($pcs as $pc)
    <tr>
      <th scope="row">{{$pc->id}}</th>
      <td>{{$pc->nome}}</td>
      <td>{{$pc->mac}}</td>
      <td>{{$pc->indirizzoIp}}</td>
      <td><a href="/eliminaPc/{{$pc->id}}">Elimina</a></td>
    </tr>
@endforeach
  </tbody>
</table>

@if($remain>0)
<button class="btn btn-primary"><a href="inserisciPc" style="color: white;">INSERISCI PC</a></button>
@endif
@if($remain>0)
<p style="color: green;">Possono essere inseriti ancora {{$remain}} pc</p>
@else
<p style="color: red;">Non possono essere inseriti altri pc license terminate. Contattare fioretti.m88@gmail.com per nuove license, oppure rimuvore uno esistente </p>
@endif
	</div>
    </div>
</div>

@endsection
