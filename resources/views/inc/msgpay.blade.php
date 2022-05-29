@if(!empty(Session::get('info_code')) && Session::get('info_code') == 1)
<div class="alert alert-success">
   <strong>Покупка успешна {{ Session::get('msg') }}</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 1)
<div class="alert alert-danger">
   <strong>Нет денег</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if(!empty(Session::get('error_currency')) && Session::get('error_currency') == 1)
<div class="alert alert-danger">
   <strong>Выбранная валюта не верна</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if(!empty(Session::get('error_currency_rub')) && Session::get('error_currency_rub') == 1)
<div class="alert alert-danger">
   <strong>Минимальная сумма в рублях 100</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if(!empty(Session::get('error_currency_uah')) && Session::get('error_currency_uah') == 1)
<div class="alert alert-danger">
   <strong>Минимальная сумма в гривнах 100</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if(!empty(Session::get('info_item')) && Session::get('info_item') == 1)
<div class="alert alert-danger">
   <strong>Неверное колличество</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if(!empty(Session::get('access_status')) && Session::get('access_status') == 2)
<div class="alert alert-success">
   <strong>Счет успешно поплнен!</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if(!empty(Session::get('error_status')) && Session::get('error_status') == 2)
<div class="alert alert-danger">
   <strong>Не удалось пополнить счет!</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if(!empty(Session::get('error_pers')) && Session::get('error_pers') == 1)
<div class="alert alert-danger">
   <strong>Ой ой, {{ Session::get('info_guild_pers') }} это не ваш персонаж!</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if(!empty(Session::get('error_pers_guild')) && Session::get('error_pers_guild') == 1)
<div class="alert alert-danger">
   <strong>Персонаж {{ Session::get('info_guild_pers') }} ещё состоит в гильдии {{ Session::get('info_guild_name') }} !</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if(!empty(Session::get('info_guild')) && Session::get('info_guild') == 1)
<div class="alert alert-success">
   <strong>Штраф с персонажа {{ Session::get('info_guild_pers') }} успешно снят необходимо перезайди за персонажа если вы были онлайн!</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if(!empty(Session::get('error_pers_one')) && Session::get('error_pers_one') == 1)
<div class="alert alert-danger">
   <strong>Персонаж {{ Session::get('info_guild_pers') }} никогда не состоял в гильдии !</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if(!empty(Session::get('error_pers_guild_block')) && Session::get('error_pers_guild_block') == 1)
<div class="alert alert-danger">
   <strong>Персонаж {{ Session::get('info_race_pers') }} не имеет штрафа на ГИ !</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if(!empty(Session::get('pers_online')) && Session::get('pers_online') == 1)
<div class="alert alert-danger">
   <strong>Один из ваших персонажей в игре, пожалуйста выйдите из игры!</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if(!empty(Session::get('pers_race_error')) && Session::get('pers_race_error') == 1)
@if (Session::get('info_race') == 3)
<div class="alert alert-danger">
   <strong>У персонажа {{ Session::get('info_race_pers') }} уже раса Гая </strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if (Session::get('info_race') == 4)
<div class="alert alert-danger">
   <strong>У персонажа {{ Session::get('info_race_pers') }} уже раса Дева </strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif
@if (Session::get('info_race') == 5)
<div class="alert alert-danger">
   <strong>У персонажа {{ Session::get('info_race_pers') }} уже раса Асура </strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif
@endif

@if(!empty(Session::get('error_race')) && Session::get('error_race') == 1)
<div class="alert alert-danger">
   <strong>Ой, такой расы вообще не существует!</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif


@if(!empty(Session::get('error_sex')) && Session::get('error_sex') == 1)
<div class="alert alert-danger">
   <strong>Ой, такого пола вообще не существует!</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if(!empty(Session::get('access_status_race')) && Session::get('access_status_race') == 1)
@if (Session::get('info_race') == 3)
<div class="alert alert-success">
   <strong>Вы успешно сменили расу у персонажа {{ Session::get('info_race_pers') }} на Гая!</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif
@if (Session::get('info_race') == 4)
<div class="alert alert-success">
   <strong>Вы успешно сменили расу у персонажа {{ Session::get('info_race_pers') }} на Дева!</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif
@if (Session::get('info_race') == 5)
<div class="alert alert-success">
   <strong>Вы успешно сменили расу у персонажа {{ Session::get('info_race_pers') }} на Асура!</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif
@endif


@if(!empty(Session::get('pers_sex_error')) && Session::get('pers_sex_error') == 1)
@if (Session::get('info_sex') == 2)
<div class="alert alert-danger">
   <strong>У персонажа {{ Session::get('info_sex_persname') }} уже мужской пол!</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif
@if (Session::get('info_sex') == 1)
<div class="alert alert-danger">
   <strong>У персонажа {{ Session::get('info_sex_persname') }} уже женский пол!</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif
@endif


@if(!empty(Session::get('access_status_sex')) && Session::get('access_status_sex') == 1)
@if (Session::get('info_sex') == 2)
<div class="alert alert-success">
   <strong>Вы успешно сменили пол у персонажа {{ Session::get('info_sex_persname') }} на мужской!</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif

@if (Session::get('info_sex') == 1)
<div class="alert alert-success">
   <strong>Вы успешно сменили пол у персонажа {{ Session::get('info_sex_persname') }} на женский!</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
</div>
@endif
@endif
