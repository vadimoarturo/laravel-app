<div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <h4>Мой профиль</h4>
		                    <hr>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
		                    <form>
                              <div class="form-group row">
                                <div class="col-8">
                                  <p class="">Моя почта: {{ Auth::user()->email }}</p>
                                </div>
                                <div class="col-8 mt-3">
                                  @if(empty(Auth::user()->email_verified_at))
                                  <p class="alert alert-danger">Внимание доступ в игру заблокирован! Подтвердите почту!</p>
                                  <a class="btn btn-dark" href="email/verify">Подтвердить почту</a>
                                  @else
                                  <p class="alert alert-success">Ваша почта подтверждена! Доступ в игру разблокирован!</p>
                                  @endif
                                </div>
                              <div class="col-8 mt-3">
                                <a class="btn btn-dark" href="password/reset">Сбросить пароль</a>
                              </div>
                              </div>

                            </form>
		                </div>
		            </div>

		        </div>
</div>
