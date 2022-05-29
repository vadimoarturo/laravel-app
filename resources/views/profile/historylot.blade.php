<div class="card">
  		        <div class="card-body">
  		            <div class="row">
  		                <div class="col-md-12">
  		                    <h4>История аукциона</h4>
  		                    <hr>
  		                </div>
  		            </div>
  		            <div class="row">

                  <h4>Вы продали</h4>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Статус</th>
                        <th>Лот выставлен от</th>
                        <th>Сколько руппий</th>
                        <th>За сколько рублей</th>
                        <th>Дата продажи</th>
                        <th>Дата создания лота</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($userlothistory as $historyuserlot)
                      @if($historyuserlot->status == "pay")
                    <tr>
                  <td><p class="alert alert-success">Продан<p></td>
                  <td>{{$historyuserlot->name}}</td>
                  <td>{{$historyuserlot->price_rup}} <strong>RUP</strong></td>
                  <td>{{$historyuserlot->price_rub}} <strong>RUB</strong></td>
                  <td>{{$historyuserlot->date_buy}}</td>
                  <td>{{$historyuserlot->date_create}}</td>
                  </tr>
                  @endif
                    @endforeach
                </tbody>
                </table>

                <h4>Вы купили</h4>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Статус</th>
                      <th>Лот выставлен от</th>
                      <th>Сколько руппий</th>
                      <th>За сколько рублей</th>
                      <th>Дата покупки</th>
                      <th>Дата создания лота</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($userlothistorybuy as $historyuserlotbuy)
                    @if($historyuserlotbuy->status == "pay")
                  <tr>
                <td><p class="alert alert-warning">Куплен<p></td>
                <td>{{$historyuserlotbuy->name}}</td>
                <td>{{$historyuserlotbuy->price_rup}} <strong>RUP</strong></td>
                <td>{{$historyuserlotbuy->price_rub}} <strong>RUB</strong></td>
                <td>{{$historyuserlotbuy->date_buy}}</td>
                <td>{{$historyuserlotbuy->date_create}}</td>
                </tr>
                    @endif
                  @endforeach
              </tbody>
              </table>

                <h4>Вы отменили</h4>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Статус</th>
                      <th>Лот выставлен от</th>
                      <th>Сколько руппий</th>
                      <th>За сколько рублей</th>
                      <th>Дата отмены</th>
                      <th>Дата создания лота</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($userlothistory as $historyuserlot)
                    @if($historyuserlot->status == "destroy")
                  <tr>
                <td><p class="alert alert-danger">Отменен</p></td>
                <td>{{$historyuserlot->name}}</td>
                <td>{{$historyuserlot->price_rup}} <strong>RUP</strong></td>
                <td>{{$historyuserlot->price_rub}} <strong>RUB</strong></td>
                <td>{{$historyuserlot->date_destroy}}</td>
                <td>{{$historyuserlot->date_create}}</td>
                </tr>
                @endif
                  @endforeach
              </tbody>
              </table>
  		            </div>
  		        </div>
  </div>
