<!doctype html>
<html>
<head>
<meta charset="Windows-1252">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RealEdition</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

<!-- MY -->
<link href="css/app.css" rel="stylesheet" type="text/css">
<link href="css/custom.css" rel="stylesheet" type="text/css">
<script src="js/app.js" ></script>
<script src="js/custom.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 {!! NoCaptcha::renderJs() !!}

</head>
<body>
  @if(!empty(Session::get('error_giftguild')) && Session::get('error_mypers') == 1)
  <div class="alert alert-danger">
     <strong>Подарок уже выдан !</strong>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
  </div>
  @endif

  @if(!empty(Session::get('error_login')) && Session::get('error_login') == 1)
  <div class="alert alert-danger">
     <strong>Такого аккаунта нет!</strong>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
  </div>
  @endif

  @if(!empty(Session::get('error_name')) && Session::get('error_name') == 1)
  <div class="alert alert-danger">
     <strong>Такого персонажа нет!</strong>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
  </div>
  @endif

<div class="container">
  <form method="POST" action="{{ route('search-player') }}">
        @csrf
  <div class="form-group">
  <label for="login_name"><strong>Логин</strong></label>
  <input type="text" class="form-control active" value="" name="login_name"><br>
  <label for="name_pers"><strong>Ник персонажа</strong></label>
  <input type="text" class="form-control active" value="" name="name_pers"><br>
    <button type="submit" class="btn btn-primary">
        {{ __('Найти аккаунт') }}
    </button>

  </div>


  </form>
 <table class="table table-hover">
    @foreach ($rate as $rateserver)
   <thead>
     <tr>
       <th>Дроп {{$rateserver->server_id}}</th>
       <th>Опыт {{$rateserver->server_id}}</th>
      <th>Последнее изменение {{$rateserver->server_id}}</th>
        <th>Изминил</th>
     </tr>
   </thead>
      <tbody>
          <td>
        <div class="ajaxDropRate">
          <input  value="{{$rateserver->server_drop}}" name="{{$rateserver->server_id}}">
          </div>
        </td>

        <td>
      <div class="ajaxExpRate">
        <input  value="{{$rateserver->server_exp}}" name="{{$rateserver->server_id}}">
        </div>
      </td>
        <td>{{$rateserver->last_change}}</td>
        @if($rateserver->change_name == "vadimka")
        <td>Вадим</td>
        @elseif($rateserver->change_name == "SILVERFAL100")
        <td>Артем</td>
        @endif
    @endforeach
      </tbody>
   </table>
</div>

 <table class="table table-hover">
   <thead>
     <tr>
       <th>Id</th>
       <th>Login</th>
       <th>IP при регистрации</th>
       <th>IP последний замеченный</th>
       <th>Баланс</th>
      <th>Баланс за все время</th>
       <th>Статус</th>
       <th>Персонажи на аккаунте</th>
       <th>Подарок за ГИ</th>
     </tr>
   </thead>
   <tbody>
@foreach ($users as $usersinfo)
             @if($usersinfo->block == 1 )
       <tr class="bg-danger text-white">
        @else
               <tr>
        @endif
               <meta id="crf" name="csrf-token" content="{{ csrf_token() }}">
                        <td><p>{{ $usersinfo->account_id }}</p></td>
         <td>{{$usersinfo->name}}</td>
         <td>{{$usersinfo->ip}}</td>
        <td>{{$usersinfo->last_ip}}</td>

                  <td>
                            <div class="ajaxBalance">
        @if(Auth::user()->ffadminprivgg == "YESSUKAPRO")

          <input  value="{{$usersinfo->rub}}" name="{{$usersinfo->name}}">

        @else
        {{$usersinfo->rub}}
        @endif
                </td>

        </div>
                <td>{{$usersinfo->rub_all}}</td>
         <td>
          <div class="ajaxUpdate">
             @if($usersinfo->block == 1 )
          <button type="button" value="0" name="{{ $usersinfo->name }}" class="btn btn-primary">
          {{ __('Разблокировать') }}
          </button>
          @else
         <button type="button" value="1" name="{{ $usersinfo->name }}" class="btn btn-primary">
          {{ __('Заблокировать') }}
          @endif
          </button>
         </div>

         </td>

         <td>
        @foreach ($pers as $persaccount)
        @if($persaccount->account == $usersinfo->name)
        {{$persaccount->name}}
        <p style="color:red;">{{$persaccount->lv}}-LVL</p>
        {{$persaccount->sid}}-ID
        @endif
          @endforeach
        </td>


         <td>
                            <div class="ajaxGuild">
          @if ( $usersinfo->gift_guild == 0 )
          <button type="button" value="1" name="{{ $usersinfo->account_id }}" class="btn btn-primary">
          {{ __('Выдать подарок') }}
          </button>
          @else
          <p>Подарок уже выдан</p>
          @endif
                         </div>
          </td>

       </tr>
 @endforeach
 </tbody>
 </table>




        {{ $users->links() }}
</body>

<script type="text/javascript">
function ajaxUpdate() {
    var buttonsguild = document.querySelectorAll(".ajaxUpdate button");
    var buttons = document.querySelectorAll(".ajaxGuild button");
    var inputs = document.querySelectorAll(".ajaxBalance input");
    var inputdrop = document.querySelectorAll(".ajaxDropRate input");
    var inputexp = document.querySelectorAll(".ajaxExpRate input");

    for (let i=0; i < inputdrop.length; i++) {
        inputdrop[i].addEventListener("change", ajaxDropRate, false);
    }

    for (let i=0; i < inputexp.length; i++) {
        inputexp[i].addEventListener("change", ajaxExpRate, false);
    }

    for (let i=0; i < buttonsguild.length; i++) {
        buttonsguild[i].addEventListener("click", ajaxSave, false);
    }
    for (let i=0; i < inputs.length; i++) {
        inputs[i].addEventListener("change", ajaxBalance, false);
    }

    for (let i=0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", ajaxGuild, false);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    ajaxUpdate();
});


function ajaxDropRate() {
  var crf = document.getElementById('crf').content;
  var _this = this;
  var request = new XMLHttpRequest();
  var body = '_token=' + encodeURIComponent(crf) + '&droprate=' + encodeURIComponent(this.value) + '&serverid=' + encodeURIComponent(this.name);
  request.open("POST", '/changeratedrop', true);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.send(body);
          location.reload();
}

function ajaxExpRate() {
  var crf = document.getElementById('crf').content;
  var _this = this;
  var request = new XMLHttpRequest();
  var body = '_token=' + encodeURIComponent(crf) + '&exprate=' + encodeURIComponent(this.value) + '&serverid=' + encodeURIComponent(this.name);
  request.open("POST", '/changerateexp', true);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.send(body);
        location.reload();
}


function ajaxBalance() {
  var crf = document.getElementById('crf').content;
  var _this = this;
  var request = new XMLHttpRequest();
  var body = '_token=' + encodeURIComponent(crf) + '&setrub=' + encodeURIComponent(this.value) + '&accountname=' + encodeURIComponent(this.name);
  request.open("POST", '/changebalance', true);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.send(body);
    location.reload();
}


function ajaxSave() {
    var crf = document.getElementById('crf').content;
    var _this = this;
    var request = new XMLHttpRequest();
    var body = '_token=' + encodeURIComponent(crf) + '&set=' + encodeURIComponent(this.value) + '&where=' + encodeURIComponent(this.name);
    request.open("POST", '/blockchange', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(body);
    location.reload();
  }


  function ajaxGuild() {
    var crf = document.getElementById('crf').content;
    var _this = this;
    var request = new XMLHttpRequest();
    var body = '_token=' + encodeURIComponent(crf) + '&setint=' + encodeURIComponent(this.value) + '&wherename=' + encodeURIComponent(this.name);
    request.open("POST", '/giftguild', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(body);
    location.reload();
  }

</script>
</html>
