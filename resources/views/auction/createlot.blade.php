<div id="createlot" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title"></h5>
</div>
<div class="modal-body">
    @foreach ($cladovka as $cladovka72)
  <p>Руппий в кладовке: {{ $cladovka72->cnt }}</p>
            @endforeach
  <form method="POST" action="{{ route('auction-create') }}">
      @csrf
            <p>Сколько руппий продаете:</p>
            <input type="number" class="form-control active" name="auction_rup" min="1000000" value="1000000" autocompleted=""><br>
            <p>За сколько RE продаете:</p>
            <input type="number" class="form-control active" name="auction_rub" min="1" value="1" autocompleted=""><br>
            <p>Ваш лот выставится от имени персонажа имеющий максимальный уровень на данном аккаунте</p>

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
                  {{ __('Создать лот') }}
              </button>
        </div>
  </form>
</div>
</div>
</div>
</div>
