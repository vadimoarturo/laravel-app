@if (Auth::check())
@if (Auth::user()->ffadminprivgg == "YESSUKA")
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>


</head>
<body>

  <ul class="list-group list-group-flush ">
    <li class="list-group-item bg-dark">
      <div class="filter-buttonadmin">
      <button class="btn btn-default text-light" data-filteradmin="adminshop">Магазин</button>
      <button class="btn btn-defaul text-light" data-filteradmin="adminpaybay">Истории баланса</button>
     </div>
   </li>
  </ul>
@yield('content')

</body>
<script type="text/javascript">
function menu() {
    var buttons = document.querySelectorAll(".filter-buttonadmin button");
    for (let i=0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", menuselect, false);
    }
}


var adminselect =  document.querySelectorAll('.filter');

function menuselect() {
    var filter = this.dataset.filteradmin;
    for (let i=0; i < adminselect.length; i++) {
        if (adminselect[i].classList.contains(filter)) {
          adminselect[i].style.display = 'block';
        } else {
          adminselect[i].style.display = 'none';
        }

            console.log(adminselect[i],filter);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    menu();
});
</script>
</html>
@else
<script type="text/javascript">
  window.location.href = "/404";
</script>
@endif
@else
<script type="text/javascript">
  window.location.href = "/404";
</script>
@endif
