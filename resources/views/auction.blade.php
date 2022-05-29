@extends('layouts.app')

@section('content')
@include ('auction.msgauction')
<section id="auction" style="min-height:100vh">
<div class="container mt-5">
  <div class="row">
    <div class="col"></div>
    <div class="col">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createlot">Создать лот</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mylot">Мои активные лоты</button>
  </div>
    <div class="col"></div>
  </div>
</div>

<div class="container mt-5">
@include ('auction.showlot')
  {{ $lot->withQueryString()->links() }}
</div>

</section>
@include ('auction.createlot')
@include ('auction.mylot')
@endsection
