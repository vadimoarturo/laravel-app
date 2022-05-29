
<div class="card" style="float-right;">
    <div class="card-header">
      Категории
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <button class="btn btn-default" onclick="location.href='https://example.ru/shop';" style="color: green;">Все товары</button>
        <br>
        @foreach($category as $elle)
        @if($elle->category_text != 'Акции')
        <button class="btn btn-default" onclick="location.href='https://example.ru/shop?tag={{ $elle->category_name }}';">{{ $elle->category_text }}</button>
        <br>
        @else
        <button class="btn btn-default" onclick="location.href='https://example.ru/shop?tag={{ $elle->category_name }}';" style="color: red;">{{ $elle->category_text }}</button>
        <br>
        @endif
        @endforeach
        <button class="btn btn-default" data-toggle="modal" data-target="#guild">{{ __('Снять штраф гильдии') }}</button>
        <br>
        <button class="btn btn-default" data-toggle="modal" data-target="#sex">{{ __('Смена пола') }}</button>
        <br>


</li>
    </ul>
  </div>
<br>
