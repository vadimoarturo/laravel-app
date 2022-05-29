@extends('layouts.app')
@section('content')

<div class="container mt-5 " style="min-height:100vh">
<div class="row ">
  <div class="col-md-3">
    <ul class="list-group  filter-tabprofile ">
        <button class="list-group-item list-group-item-action" data-filterprofile="mypers">Информация об аккаунте</button>
        <button class="list-group-item list-group-item-action" data-filterprofile="myreferal">Реферальная программа</button>
        <button class="list-group-item list-group-item-action" data-filterprofile="historypay">История пополнения</button>
        <button class="list-group-item list-group-item-action" data-filterprofile="historybuy">История покупок</button>
        <button class="list-group-item list-group-item-action" data-filterprofile="historylot">История лотов</button>
    </ul>
  </div>

  <div class="col-md-9">

  <div class="filter mypers container">
  @include ('profile.mypers')
  </div>

  <div style="display: none;" class="filter myreferal container">
  @include ('profile.myreferal')
  </div>

  <div style="display: none;" class="filter historylot container">
  @include ('profile.historylot')
  </div>

  </div>

</div>
</div>







<script type="text/javascript">
function menu() {
  var buttons = document.querySelectorAll(".filter-tabprofile button");
  for (let i=0; i < buttons.length; i++) {
      buttons[i].addEventListener("click", menuselect, false);
  }
}


var profileselect =  document.querySelectorAll('.filter');

function menuselect() {
  var filter = this.dataset.filterprofile;
  for (let i=0; i < profileselect.length; i++) {
      if (profileselect[i].classList.contains(filter)) {
        profileselect[i].style.display = 'block';
      } else {
        profileselect[i].style.display = 'none';
      }

          console.log(profileselect[i],filter);
  }
}

document.addEventListener("DOMContentLoaded", () => {
  menu();
});
</script>
@endsection
