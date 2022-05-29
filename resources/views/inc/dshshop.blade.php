<div class="card" style="float-right;">

    <div class="card-header">
      Баланс
    </div>
          @if (Auth::check())
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><strong>RE</strong>: {{ Auth::user()->rub}}</li>

        <button class="btn btn-default" data-toggle="modal" data-target="#balance">{{ __('Пополнить баланс') }}</button>

  @else
  <li class="list-group-item">Вы не авторизованы:<br><a href="/login">Войти</a></li>
  @endif
  </ul>
    </div>
    <br>
  <br>
