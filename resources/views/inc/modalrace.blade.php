<div id="race" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">{{ __('Смена расы') }}</h5>
</div>
<div class="modal-body">
<div class="col">
<p>Цена : 499 <strong>RUB</strong></p>
</div>
<form method="POST" action="{{ route('race-buy') }}">
        @csrf
          @if (Auth::check())
      <div class="form-group">
  <label for="selectpersnamerace">{{ __('Выберите персонажа') }}</label>
  <select class="form-control" id="selectpersnamerace" name="persnamerace">
    @foreach ($pers72 as $persrace)
  <option value="{{ $persrace->name }}">{{ $persrace->name }}</option>
      @endforeach
  </select>

  <label for="selectracepers">{{ __('Выберите расу') }}</label>
  <select class="form-control" id="selectracepers" name="racepers">
  <option value="3">{{ __('Гая') }}</option>
  <option value="4">{{ __('Дева') }}</option>
  <option value="5">{{ __('Асура') }}</option>
  </select>


</div>

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

      <div class="modal-footer">
            <button type="submit" class="btn btn-primary">
                {{ __('Сменить расу') }}
            </button>
      </div>
      @else
      <div class="modal-footer">
        <p class="card-text">Вы не авторизованы, <a href="/login">Войти</a> что бы купить снять штраф</p>
      </div>
      @endif
</form>

</div>
</div>
</div>
</div>
