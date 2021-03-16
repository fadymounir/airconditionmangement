<div class="modal fade" id="{{$id}}" tabindex="-100" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog @if(isset($modalLarge)) {{$modalLarge}}   @endif " role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="{{$modalTitleId ?? 'modalTitle' }}">{!! $modalTitle ?? 'modal title' !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="{{$modalBodyId ?? 'modalBodyId'}}">
                 {!! $modalBody ?? '' !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" >  {{$closebtnContent ?? 'اغلاق'}}  </button>
                <button type="button" class="btn btn-primary {{$submitBtnClass ?? '' }}" id="{{$submitBtnId ?? 'submit'}}">{{$submitContent ?? 'حفظ'}}</button>
            </div>
        </div>
    </div>
</div>
