{{-- 
    Works For       : A modal component for displaying messages
    Param           : null
    Component call  : <x-com-modalpesan></x-com-modalpesan>
    Example Call    : <x-com-modalpesan></x-com-modalpesan>

--}}
{{-- <div class="modal fade modal-pesan-sm" tabindex="-1" id="modalPesan" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" id="modal-content">
            
        </div>
    </div>
</div> --}}


<div class="modal" tabindex="-1" role="dialog" id="modalPesan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $message }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>