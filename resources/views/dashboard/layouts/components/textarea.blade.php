<div class="form-group ">
    <label for="{{$label ?? 'label'}}" class="col-md-6 col-form-label">{{$label ?? 'label'}}
        <i class="{{$icon ?? 'fa fa-user'}}"></i>
    </label>
    <div class="col-md-12">
            <textarea class="form-control classInput" id="{{$id ?? $name ?? 'name'}}" name="{{$name ?? 'name'}}" rows="{{$row ?? '3'}}">{{$value ?? ''}}</textarea>
    </div>
</div>
