<div id="{{$el->item_id_name}}" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">{{ $el->title }}</h5>
</div>
<div class="modal-body">
<div class="row">
  <div class="col">
<h5>Минимальное колличество: {{ $el->count }}</h5>
<p>{!! html_entity_decode($el->text)  !!}</p>
<p>Цена : {{ $el->price_rub }} <strong>RE</strong> за {{ $el->count }} шт</p>
<p>Срок жизни/действия : {{ $el->life }}</p>
  </div>
    <div class="col">
@if ($el->set == "parents" && $el->image != NULL)
<img src="/image/shop/set/{{$el->image}}.png" alt="image shop">
@elseif($el->image != NULL)
<img src="/image/shop/item/{{$el->image}}.png" alt="image shop">
@endif
  </div>
</div>
@if ($el->set == "parents")
<form method="POST" action="{{ route('shop-buy') }}">
      @csrf
    <input type="hidden" name="item_id" value="{{ $el->item_id }}">
    <input type="hidden" name="set_id" value="{{ $el->set_id }}">
    <input type="hidden" name="item_name" value="{{ $el->title }}">

    @if (Auth::check())
    <input type="hidden"  min="{{ $el->count }}" name="count"  value="{{ $el->count }}" >
      <div class="modal-footer">
            <button type="submit" class="btn btn-primary">
                {{ __('Получить') }}
            </button>
      </div>
      @else
      <div class="modal-footer">
        <p class="card-text">Вы не авторизованы, <a href="/login">Войти</a> что бы купить предмет</p>
      </div>
      @endif
</form>
@else
<form method="POST" action="{{ route('shop-buy') }}">
    @csrf

    <input type="hidden" name="item_id" value="{{ $el->item_id }}">
    <input type="hidden" name="item_name" value="{{ $el->title }}">

    @if (Auth::check())
    @if ( $el->stack == "true" )
          <div class="priceUpdate">
    <div class="modal-body">
    <p>Выбрать другое колличество:</p>
      <input type="number" data-pricerub="{{ $el->price_rub }}"  data-itemid="{{ $el->item_id }}"  min="{{ $el->count }}" name="count" class="form-control active" value="{{ $el->count }}" autocompleted="">
    <p id="otherpricetitle{{ $el->item_id }}"></p>
    <p id="otherpricerub{{ $el->item_id }}"></p>
    </div>
        </div>
    @else
    <input type="hidden"  min="{{ $el->count }}" name="count"  value="{{ $el->count }}" >
        @endif

      <div class="modal-footer">
            <button type="submit" class="btn btn-primary">
                {{ __('Получить') }}
            </button>
      </div>
      @else
      <div class="modal-footer">
        <p class="card-text">Вы не авторизованы, <a href="/login">Войти</a> что бы купить предмет</p>
      </div>
      @endif
</form>
@endif
</div>
</div>
</div>
</div>
<script type="text/javascript">
function priceUpdate() {
    var inputs = document.querySelectorAll(".priceUpdate input");
    for (let i=0; i < inputs.length; i++) {
        inputs[i].addEventListener("change", priceShow, false);
    }
}
function priceShow() {
var pricerub = this.dataset.pricerub;
var count = this.value;
var min = this.min;
    if ( min <= 1) {
      document.getElementById('otherpricetitle'+this.dataset.itemid).innerHTML = "Другая цена";
      document.getElementById('otherpricerub'+this.dataset.itemid).innerHTML = "Цена в RE: " + ( Math.floor((this.dataset.pricerub*count) * 100) / 100 ) + " за " + count + " шт";
    }

    else{
  var otherpricerub = pricerub/min;
  document.getElementById('otherpricetitle'+this.dataset.itemid).innerHTML = "Другая цена";
  document.getElementById('otherpricerub'+this.dataset.itemid).innerHTML = "Цена в RE: " + ( Math.floor((otherpricerub*count) * 100) / 100 )+ " за " + count + " шт";
    }

}
</script>
