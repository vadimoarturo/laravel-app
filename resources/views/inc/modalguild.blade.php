<div id="guild" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Снятие штрафа на ГИ</h5>
</div>
<div class="modal-body">
<div class="col">
<p>Цена : 100 <strong>RUB</strong></p>
</div>
<form method="POST" action="{{ route('guild-buy') }}">
        @csrf
          @if (Auth::check())
      <div class="form-group">
  <label for="selectpersnameguild">Выберите персонажа</label>
  <select class="form-control" id="selectpersnameguild" name="persnameguild">
    @foreach ($pers72 as $persguild)
  <option value="{{ $persguild->name }}">{{ $persguild->name }}</option>
      @endforeach
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
                {{ __('Снять штраф') }}
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
