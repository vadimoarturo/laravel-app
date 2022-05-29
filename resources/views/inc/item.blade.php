@foreach ($item as $el)
<div class="col card  mb-4 mb-sm-0 m-3">
<div class="card-body text-center">
<img src="/image/shop/{{$el->icon}}.jpg" alt="image shop">
<p class="card-text">{{ $el->title }}</p>
<p class="card-text">Цена : {{ $el->price_rub }} <strong>RE</strong> за {{ $el->count  }} шт</p>
</div>
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#{{ $el['item_id_name'] }}">Получить</button>
            @include ('inc.modalitem')

</div>
@endforeach
