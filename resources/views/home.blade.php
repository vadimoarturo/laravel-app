@extends('layouts.app')

@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
       <strong>{!! \Session::get('success') !!}</strong>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
    </div>
@endif
@if(!empty(Session::get('error_mypers')) && Session::get('error_mypers') == 1)
<div class="alert alert-danger">
   <strong>У вас не создан персонаж или вы не открыли кладовку!</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif
@if(!empty(Session::get('info_register')) && Session::get('info_register') == 1)
<div class="alert alert-success">
   <strong>Вы успешно зарегистрировались, на вашу почту отправильно письмо для подтверждения аккаунта, почту необходимо подтвердить что бы разблокировать аккаунт!</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if(!empty(Session::get('error_block')) && Session::get('error_block') == 1)
<div class="alert alert-danger">
   <strong>Ваш аккаунт заблокирован! Возможно вы не подтвердили свою почту!</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

<section id="parallax" style="min-height:100vh">


<div class="container mt-5" >
  <div class="row">
    <div class="col"></div>
    <div class="col">
        <a href="" type="button" class="btn btn-primary btn-lg">Yandex client 8.1 EN/RU</a>
    </div>
    <div class="col">
      <a href="" type="button" class="btn btn-primary btn-lg">Google client 8.1 EN/RU</a>
  </div>
    <div class="col">
      <a href="" type="button" class="btn btn-primary btn-lg">Discord info server from English</a>
  </div>
    <div class="col"></div>
  </div>

</div>
<div class="container mt-5">
  <div class="row">
    <div class="col">

    </div>
    <div class="col-6">
      <div class="embed-responsive embed-responsive-16by9">
      <iframe width="560" height="315" class="embed-responsive-item" src=""></iframe>
    </div>
    </div>
    <div class="col">

    </div>
  </div>

</div>



  <ul id="scene">
    <li class="layer" data-depth=".1"><img src="/image/iblis.png"></li>
    <li class="layer mt-5" data-depth=".1"><img src="/image/naga.png"></li>
    <li class="layer mt-5" data-depth="0.24"><img src="/image/jopa.png"></li>
  </ul>
</section>


<section>


</section>
<script>
  var scene = document.getElementById('scene');
  var parallax = new Parallax(scene);
</script>
@endsection
