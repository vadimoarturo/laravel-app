
  <div class="card">
  		        <div class="card-body">
  		            <div class="row">
  		                <div class="col-md-12">
  		                    <h4>Реферальная программа</h4>
  		                    <hr>
  		                </div>
  		            </div>
  		            <div class="row">
  		                <div class="col-md-12">
  		                    <form>
                                <div class="form-group row">
                                  <p class="">Реферальная ссылка нажми чтобы скопировать:</li>
                                  <p class="js-copy alert alert-success">example.ru/register?inviteref={{ Auth::user()->name }}</p>
                                  <p class="">Вы пригласили: {{ Auth::user()->refer_count }} человек(a)</p>
                                 <p class="">Ваш процент начислений: {{ Auth::user()->refer_sale }}%</p>
                                 @if(Auth::user()->refer_by == "false")
                                 <p class="">Вас пригласил: Никто</li>
                                 @else
                                  <p class="">Вас пригласил: {{ Auth::user()->refer_by }}</p>
                                 @endif

                                <p class="">Всего начислено: {{ $userreferlhistory->sum('rub_add') }} <strong>RUB</strong></p>
                                </div>

                              </form>

  		                </div>
  		            </div>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Количество начисления</th>
                        <th>От кого</th>
                        <th>Дата начисления</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($userreferlhistory as $historyreferl)

                    <tr>
                  <td>{{$historyreferl->rub_add}} <strong>RUB</strong></td>
                  <td>{{$historyreferl->referuser_account_name}}</td>
                  <td>{{$historyreferl->date_add}}</td>
                  </tr>
                    @endforeach
                </tbody>
                </table>
  		        </div>
  </div>


<script type="text/javascript">
setAutoCopyFeatures()

/***/

function setAutoCopyFeatures() {
onclick_copySelf(); /* class="js-copy" */
onclick_copyFrom(); /* class="js-copy-btn", "js-copy-target" */

// Открыл функцию - сразу видно, что она делает
// Не вдаваясь в подробности, можно вспомнить, какие классы нужно добавить в HTML

function onclick_copySelf() {
  let copy = document.querySelectorAll('.js-copy');

  for( let i = 0; i < copy.length; i++ ) {
    copy[i].addEventListener('click', function() {
      copyToClipboard( this.textContent );
      ui_copyDone( this );
    });
  }
}

function onclick_copyFrom() {
  let btn = document.querySelectorAll('.js-copy-btn');

  for( let i = 0; i < btn.length; i++ ) {
    btn[i].addEventListener('click', function() {
      let div = document.querySelectorAll('.js-copy-target');

      copyToClipboard( div[i].textContent );
      ui_copyDone( this );
    });
  }
}

/***/

function copyToClipboard(str) {
  var area = document.createElement('textarea');

  document.body.appendChild(area);
  area.value = str;
  area.select();
  document.execCommand("copy");
  document.body.removeChild(area);
}

function ui_copyDone(btn) {
  var contentSaved = btn.innerHTML;

  btn.innerHTML = 'Скопирова<span style="color: red;">но</span>';
  btn.classList.add('copied');

  setTimeout(function() {
    btn.innerHTML = contentSaved;
    btn.classList.remove('copied');
  }, 1500);
}
}
</script>
