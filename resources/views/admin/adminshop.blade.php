@extends('layouts.adminapp')
@section('content')
<div class="filter adminshop container pt-4">
<div class="ajaxUpdate">
@foreach ($item as $el)
 <div class="card">
    <div class="card-body">

      <meta id="crf" name="csrf-token" content="{{ csrf_token() }}">
                  <div class="input-group">
          <select id="category_id" class="form-control" name="{{ $el['item_id'] }}-category_id">
            <option selected>{{ $el['category_name'] }}</option>
            @foreach ($category as $elle)
            <option value="{{ $elle['category_id'] }}">{{ $elle['category_name'] }}</option>
            @endforeach
          </select>
          <input id="icon" class="form-control" value="{{ $el['icon'] }}" name="{{ $el['item_id'] }}-icon">
          <input id="title" class="form-control" value="{{ $el['title'] }}" name="{{ $el['item_id'] }}-title">
          <input class="form-control" value="{{ $el['text'] }}" name="{{ $el['item_id'] }}-text">
          <input class="form-control" value="{{ $el['count'] }}" name="{{ $el['item_id'] }}-count">
          <input class="form-control" value="{{ $el['price_rub'] }}" name="{{ $el['item_id'] }}-price_rub">
          <input class="form-control" value="{{ $el['price_re'] }}" name="{{ $el['item_id'] }}-price_re">
          <input class="form-control" value="{{ $el['sale'] }}" name="{{ $el['item_id'] }}-sale">
          <input id="image" type="file" class="form-control" value="{{ $el['icon'] }}" name=""><label class="text-light" for="image">Картинка</label>

        </div>
     </div>
    <div class="card-footer">
          <button type="button" name="{{ $el['item_id'] }}" class="btn btn-primary">
                {{ __('Удалить') }}
          </button>
    </div>

 </div>
<br>
@endforeach
</div>

  <div class="ajaxCreate">
      <div class="card">
          <div class="card-body bg-dark">

            <form method="POST" action="{{ route('login') }}">
                @csrf
            <div class="input-group">
          <select class="form-control">
            <option selected>...</option>
            @foreach ($category as $elle)
            <option name="category_id" value="{{ $elle['category_id'] }}-{{ $elle['category_name'] }}">{{ $elle['category_name'] }}</option>
            @endforeach
          </select>
           <input id="image" type="file" class="form-control" value="image.png" name=""><label class="text-light" for="image">Картинка</label>
            <input class="form-control" value="" name="">
            <input class="form-control" value="" name="">
            <input class="form-control" value="" name="">
            <input class="form-control" value="" name="">
            <input class="form-control" value="" name="">
              </div>
            <button type="submit" class="btn btn-primary">
                      {{ __('Добавить') }}
            </button>
          </form>

          </div>
      </div>
    </div>


</div>

<script type="text/javascript">
function ajaxUpdate() {
    var inputs = document.querySelectorAll(".ajaxUpdate input");
    var buttons = document.querySelectorAll(".ajaxUpdate button");
    var selects = document.querySelectorAll(".ajaxUpdate select");

    for (let i=0; i < inputs.length; i++) {
        inputs[i].addEventListener("change", ajaxSave, false);
    }

    for (let i=0; i < selects.length; i++) {
        selects[i].addEventListener("change", ajaxSave, false);
    }

    for (let i=0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", ajaxRemove, false);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    ajaxUpdate();
});

function ajaxSave() {
    var crf = document.getElementById('crf').content;
    var _this = this;
    var request = new XMLHttpRequest();
    var body = '_token=' + encodeURIComponent(crf) + '&set=' + encodeURIComponent(this.value) + '&where=' + encodeURIComponent(this.name);
    request.open("POST", '/change', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(body);
  }

function ajaxRemove() {
  var crf = document.getElementById('crf').content;
  var _this = this;
  var body = '_token=' + encodeURIComponent(crf) + '&itemid=' + encodeURIComponent(this.name);
  var request = new XMLHttpRequest();
  request.open("POST", '/remove', true);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.send(body);
  document.location.reload(true);
}
</script>

@endsection
