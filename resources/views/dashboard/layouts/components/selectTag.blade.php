<div class="form-group ">
    <label for="{{$name ?? 'label'}}" class="col-md-6 col-form-label">
        {!!  $label ?? 'label' !!}
        <i class="{{$icon ?? 'fa fa-user'}}"></i>
    </label>
    <div class="col-md-12">
        <select class="form-control {{$class  ?? ''}}" {{$selectBody ?? ''}}    id="{{$id ?? $name ?? 'name'}}" name="{{$name ?? 'name'}}">
                {!! $options !!}
        </select>
    </div>
</div>


@push('custom-scripts')
    <script>
        $(document).ready(function () {
            let selected = "null";
            @if(isset($selected)) selected = "{{$selected}}"; @endif
            let optionName = "{{$name}}";
            if (selected != "null") $('#' + optionName).val(selected);
        });

    </script>
@endpush
