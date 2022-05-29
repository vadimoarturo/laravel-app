<div id="mylot" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title"></h5>
</div>
<div class="modal-body">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Статус</th>
        <th>Лот выставлен от</th>
        <th>Сколько руппий</th>
        <th>За сколько рублей</th>
        <th>Курс за 1 RE</th>
        <th>Дата создания</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($userlot as $showmylot)
          <tr>
  <td>Создан</td>
  <td>{{ $showmylot->name }}</td>
  <td>{{ number_format($showmylot->price_rup) }} <strong>R</strong></td>
  <td>{{ number_format($showmylot->price_rub) }} <strong>RE</strong></td>
  <td>{{ number_format($showmylot->price_rup / $showmylot->price_rub) }} <strong>RE</strong></td>
  <td>{{ $showmylot->date_create }}</td>
  <td>
    <form method="POST" action="{{ route('auction-destroy') }}">
        @csrf
        <input type="hidden" name="lot_id" value="{{ $showmylot->lot_id }}">

                <button type="submit" class="btn btn-primary">
                    {{ __('Удалить') }}
                </button>

    </form>
  </td>

    </tr>
  @endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
