<ul class="list-group">
    @foreach($rows as $row)
        <li class="list-group-item">{{$row->name}}</li>
    @endforeach
</ul>
