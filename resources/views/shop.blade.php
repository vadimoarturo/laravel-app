@extends('layouts.app')
@section('content')
<div class="container mt-4" style="min-height:100vh">
<div class="row">
          @include ('inc.msgpay')

          <div class="col-md-3 order-md-2">
                @include ('inc.shoptabs')
                @include ('inc.dshshop')



          </div>

          <div class="col-md-9 order-md-1">

                  <div class="row row-cols-4 ">
                  @include ('inc.item')
              </div>

                {{ $item->withQueryString()->links() }}
            </div>
              @include ('inc.modalguild')
              @include ('inc.modalrace')
              @include ('inc.modalsex')
              @include ('inc.modalbalance')
  </div>



</div>
<script type="text/javascript">
function menu() {
    var buttons = document.querySelectorAll(".filter-button button");
    for (let i=0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", menuselect, false);
    }
}
var productcard =  document.querySelectorAll('.filter');
function menuselect() {
    var filter = this.dataset.filter;
    for (let i=0; i < productcard.length; i++) {
        if (productcard[i].classList.contains(filter)) {
          productcard[i].style.display = 'block';
        } else {
          productcard[i].style.display = 'none';
        }

    }
}
document.addEventListener("DOMContentLoaded", () => {
    menu();
        priceUpdate();
});
</script>
@endsection
