<table class="table table-hover">
  <thead>
    <tr>
      <th></th>
      <th>Предмет</th>
      <th>Продавец</th>
      <th>Купить сейчас</th>
      <th>Курс за 1 RE</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
@foreach ($lot as $lotshow)
      <tr>
        <td><img src="/image/shop/icon_rupee.png" alt="image auction"></td>
        <td>{{ number_format($lotshow->price_rup) }} <strong>R</strong></td>
        <td>{{ $lotshow->name }}</td>
        <td>{{ number_format($lotshow->price_rub) }}  <strong>RE</strong></td>
        <td>{{ number_format($lotshow->price_rup / $lotshow->price_rub) }} <strong>R</strong></td>
        @if(Auth::user()->account_id == $lotshow->account_id)
        <td ><strong class="text-danger">Это ваш лот</strong></td>
        @else
        <td>
          <form method="POST" action="{{ route('auction-buy') }}">
              @csrf
                  <input type="hidden" name="lot_id" value="{{ $lotshow->lot_id }}">
                      <button type="submit" class="btn btn-primary">
                          {{ __('Купить лот') }}
                      </button>

          </form>
        </td>
        @endif
      </tr>

@endforeach
</tbody>
</table>
