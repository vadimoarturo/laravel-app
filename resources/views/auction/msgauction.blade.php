@if(!empty(Session::get('info_code')) && Session::get('info_code') == 1)
<div class="alert alert-success">
   <strong>Лот успешно создан, отменить можете в любое время во вкладке Активные лоты {{ Session::get('msg') }}</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif
@if(!empty(Session::get('error_code')) && Session::get('error_code') == 1)
<div class="alert alert-danger">
   <strong>Столько руппий нет в кладовке</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif
@if(!empty(Session::get('error_rub')) && Session::get('error_rub') == 1)
<div class="alert alert-danger">
   <strong>У вас недостаточно рублей</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif
@if(!empty(Session::get('info_buy')) && Session::get('info_buy') == 1)
<div class="alert alert-success">
   <strong>Вы купили лот</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif
@if(!empty(Session::get('info_destroy')) && Session::get('info_destroy') == 1)
<div class="alert alert-success">
   <strong>Вы удалили лот</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif
@if(!empty(Session::get('pers_online')) && Session::get('pers_online') == 1)
<div class="alert alert-danger">
   <strong>Один из ваших персонажей в игре, пожалуйста выйдите из игры!</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif
@if(!empty(Session::get('error_mylot')) && Session::get('error_mylot') == 1)
<div class="alert alert-danger">
   <strong>Вы не можете купить свой лот, но вы его можете удалить во влкдке Мои активные лоты</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if(!empty(Session::get('error_namepers')) && Session::get('error_namepers') == 1)
<div class="alert alert-danger">
   <strong>Хватит использовать чужие имена, ты можешь использовать ник только своего игрока</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif
