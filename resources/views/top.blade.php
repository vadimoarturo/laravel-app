@extends('layouts.app')
@section('content')
<section id="top" style="min-height:100vh">


<div class="container">

<table class="table table-dark">
  <thead>
    <tr>
      <th></th>
      <th>Имя</th>
      <th>Профессия</th>
      <th>Уровень</th>
      <th>Часов в игре</th>
      <th>Убийств</th>
      <th>Гильдия</th>
    </tr>
  </thead>
  <tbody>
@foreach ($top100 as $top100users)
      <tr>
        <td></td>
        @if(str_contains($top100users->name, '<#7FFF00>'))
        <td style="color: #7FFF00"><strong>[MOD]{{str_replace('<#7FFF00>', ' ', $top100users->name)}}</strong></td>
        @else
        <td><strong>{{$top100users->name}}</strong></td>
        @endif
        <td>
          @switch ($top100users->job)
          @case(100) <div><img src='image/class/100.jpg' /><span> Странник</span></div>
        @break
        @case(101) <div><img src='image/class/101.jpg' /><span> Кадет</span></div>
        @break
        @case(102) <div><img src='image/class/102.jpg' /><span> Шаман</span></div>
        @break
        @case(103) <div><img src='image/class/103.jpg' /><span> Заклинатель</span></div>
        @break
        @case(110) <div><img src='image/class/110.jpg' /><span> Солдат</span></div>
        @break
        @case(111) <div><img src='image/class/111.jpg' /><span> Стрелок</span></div>
        @break
        @case(112) <div><img src='image/class/112.jpg' /><span> Друид</span</div>
        @break
        @case(113) <div><img src='image/class/113.jpg' /><span> Знахарь</span></div>
        @break
        @case(114) <div><img src='image/class/114.jpg' /><span> Колдун</span></div>
        @break
        @case(120) <div><img src='image/class/120.jpg' /><span> Берсерк</span></div>
        @break
        @case(121) <div><img src='image/class/121.jpg' /><span> Рейнджер</span></div>
        @break
        @case(122) <div><img src='image/class/122.jpg' /><span> Высший Друид</span></div>
        @break
        @case(123) <div><img src='image/class/123.jpg' /><span> Великий Знахарь</span></div>
        @break
        @case(124) <div><img src='image/class/124.jpg' /><span> Призыватель</span></div>
        @break
        @case(200) <div><img src='image/class/200.jpg' /><span> Следопыт</span></div>
        @break
        @case(201) <div><img src='image/class/201.jpg' /><span> Паладин</span></div>
        @break
        @case(202) <div><img src='image/class/202.jpg' /><span> Волшебник</span></div>
        @break
        @case(203) <div><img src='image/class/203.jpg' /><span> Зверолов</span></div>
        @break
        @case(210) <div><img src='image/class/210.jpg' /><span> Рыцарь</span></div>
        @break
        @case(211) <div><img src='image/class/211.jpg' /><span> Крестоносец </span></div>
        @break
        @case(212) <div><img src='image/class/212.jpg' /><span> Капеллан </span></div>
        @break
        @case(213) <div><img src='image/class/213.jpg' /><span> Клирик </span></div>
        @break
        @case(214) <div><img src='image/class/214.jpg' /><span> Дрессировщик</span></div>
        @break
        @case(220) <div><img src='image/class/220.jpg' /><span> Рыцарь Света</span></div>
        @break
        @case(221) <div><img src='image/class/221.jpg' /><span> Мечник</span></div>
        @break
        @case(222) <div><img src='image/class/222.jpg' /><span> Архиепископ</span></div>
        @break
        @case(223) <div><img src='image/class/223.jpg' /><span> Первосвященник</span></div>
        @break
        @case(224) <div><img src='image/class/224.jpg' /><span> Укротитель</span></div>
        @break
        @case(300) <div><img src='image/class/300.jpg' /><span> Бродяга</span></div>
        @break
        @case(301) <div><img src='image/class/301.jpg' /><span> Наемник</span></div>
        @break
        @case(302) <div><img src='image/class/302.jpg' /><span> Неофит</span></div>
        @break
        @case(303) <div><img src='image/class/303.jpg' /><span> Адепт</span></div>
        @break
        @case(310) <div><img src='image/class/310.jpg' /><span> Ассасин </span></div>
        @break
        @case(311) <div><img src='image/class/311.jpg' /><span> Охотник </span></div>
        @break
        @case(312) <div><img src='image/class/312.jpg' /><span> Маг хаоса</span></div>
        @break
        @case(313) <div><img src='image/class/313.jpg' /><span> Чернокнижник </span></div>
        @break
        @case(314) <div><img src='image/class/314.jpg' /><span> Чародей</span></div>
        @break
        @case(320) <div><img src='image/class/320.jpg' /><span> Убийца</span></div>
        @break
        @case(321) <div><img src='image/class/321.jpg' /><span> Ночной Охотник</span></div>
        @break
        @case(322) <div><img src='image/class/322.jpg' /><span> Лич</span></div>
        @break
        @case(323) <div><img src='image/class/323.jpg' /><span> Демон</span></div>
        @break
        @case(324) <div><img src='image/class/324.jpg' /><span> Некромант</span></div>
        @break
          @endswitch



        </td>
        <td>{{ $top100users->lv }}</td>
        <td>{{ round($top100users->play_time / 3600, 2) }}</td>
        <td>{{ $top100users->pkc }}</td>
        @foreach ( $guildid as $guildidusers )
        @if($guildidusers->player_id == $top100users->sid)
          @foreach ( $guild as $guildicon )
          @if($guildidusers->guild_id == $guildicon->sid)
          <td><div><img src='gicon/{{ $guildicon->icon }}' /><span> {{$guildicon->name}}</span></div></td>
          @endif
          @endforeach
        @endif
        @endforeach

      </tr>

@endforeach
</tbody>
</table>
</div>
<script>
$('.table tbody tr').each(function(i) {
var number = i + 1;
$(this).find('td:first').text(number);
});
</script>

</section>
@endsection
