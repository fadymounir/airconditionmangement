<div class="form-group">
    <label for="{{$label ?? 'label'}}" class="col-md-6 col-form-label">{{$label ?? 'label'}}
        <i class="{{$icon ?? 'fa fa-user'}}"></i>
    </label>
    <div class="col-md-12">
        <input    {{$inputBody ?? ''}}  id="{{$id ?? $name ?? 'name'}}"  placeholder="{{$placeHolder ?? ''}}" type="{{$type ?? 'text'}}" class="form-control classInput {{$class ?? ''}}" name="{{$name ?? 'name'}}" value="{{$value ?? ''}}">
    </div>

</div>
