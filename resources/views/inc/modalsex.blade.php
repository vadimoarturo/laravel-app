<div id="sex" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">{{ __('Смена пола') }}</h5>
</div>
<div class="modal-body">
<div class="col">
<p>Цена : 149 <strong>RUB</strong></p>
</div>
<form method="POST" action="{{ route('sex-buy') }}">
        @csrf
          @if (Auth::check())
      <div class="form-group">
  <label for="selectpersnamesex">{{ __('Выберите персонажа') }}</label>
  <select class="form-control" id="selectpersnamesex" name="persnamesex">
    @foreach ($pers72 as $perssex)
  <option value="{{ $perssex->name }}">{{ $perssex->name }}</option>
      @endforeach
  </select>

  <label for="selectsexepers">{{ __('Выберите пол') }}</label>
  <select class="form-control" id="selectsexepers" name="sexpers">
  <option value="2">{{ __('Мужской') }}</option>
  <option value="1">{{ __('Женский') }}</option>
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
                {{ __('Сменить пол') }}
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
