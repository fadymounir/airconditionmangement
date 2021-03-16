<a href="{{$link ?? '#'}}"
   class="{{$class ?? '#'}}"
    {{isset($blank) ? 'target=_blank' : '' }}  {{isset($onclick)  ? 'onclick='.$onclick : '' }} >{!!  $name  !!}</a>
