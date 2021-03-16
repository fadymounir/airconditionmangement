<span  @if(isset($class)) class="{{$class}}" @endif   {{isset($onclick)  ? 'onclick='.$onclick : '' }}  >{!!   $name !!}</span>
