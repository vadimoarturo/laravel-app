<div id="balance" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Пополнить баланс</h5>
</div>
<div class="modal-body">
            @if (Auth::check())
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>RE</strong>: {{ Auth::user()->rub}}</li>
    </ul>
        <ul class="list-group list-group-flush">
        <li class="list-group-item">

          <p>Курс на {{ date('Y-m-d H:i') }} MSK</p>
          <p>1 RUB = 1 RE</p>
          @foreach($currency as $currencyview)
          <p>{{$currencyview->nominal}} {{$currencyview->currency}} = {{$currencyview->value}} RE</p>
          @endforeach
          <p>Курс обновляется каждый день в 11:45 по MSK заданным ЦБ РФ</p>
          <p>При пополнении на любую сумму любой валюты комиссия возвращается на баланс аккаунта в RE кратной курсу валюты</p>
          <p>При пополнении любой валюты кратой или более 1000 <strong>RUB</strong> 10% дополнительно от суммы заказа + возврат комиссии на баланс аккаунта в RE кратной курсу валюты</p>
          <form method="POST" action="{{ route('shop-enot-oplata') }}">
          @csrf
          <label for="inputvalue">{{ __('Сумма:') }}</label>
          <input id="inputvalue" type="number" min="1" name="oplata" class="form-control active" value="1" autocompleted="">
          <br>
          <label for="selectcurrency">{{ __('Выбрать валюту:') }}</label>
          <select class="form-control" id="selectcurrency" name="currencyname">
          <option value="RUB">{{ __('Рубли') }}</option>
          <option value="UAH">{{ __('Гривны') }}</option>
          <option value="USD">{{ __('Доллар США - USD') }}</option>
          <option value="EUR">{{ __('Евро - EUR') }}</option>
        </select><br>
          <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
              <div class="col-md-6 offset-md-4">
                  {!! app('captcha')->display() !!}
                  @if ($errors->has('g-recaptcha-response'))
                      <span class="help-block">
                          <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
          <button type="submit" class="btn btn-primary">
          {{ __('Пожертвовать') }}
          </button>

          </form>
          <form method="POST" action="{{ route('shop-oplata') }}">
          @csrf
          <label for="inputvalue">{{ __('Сумма временно для Иностранных карт:') }}</label>
          <input id="inputvalue" type="number" min="1" name="oplata" class="form-control active" value="1" autocompleted="">
          <br>
        </select><br>
          <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
              <div class="col-md-6 offset-md-4">
                  {!! app('captcha')->display() !!}
                  @if ($errors->has('g-recaptcha-response'))
                      <span class="help-block">
                          <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
          <button type="submit" class="btn btn-primary">
          {{ __('Пожертвовать временно для Иностранных карт') }}
          </button>

          </form>
        </li>
        @else
        <li class="list-group-item">Вы не авторизованы:<br><a href="/login">Войти</a></li>
        @endif
      </ul>


</div>
</div>
</div>
</div>
