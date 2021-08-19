{{-- 
    Works For       : Modal component to display data deletion follow-up
    Param           : null
    Component call  : <x-com-modaldelete></x-com-modaldelete>
    Example Call    : <x-com-modaldelete></x-com-modaldelete>

--}}
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Security Measures</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @csrf
						<input type="password" class="form-control" placeholder="ConfirmPassword" name="btnDel" required="" id="inputConfirm">
            <small class="text-danger">Warning..!!! You Will Delete Data Permanently</small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a type="button" href="javascript:void(0)" class="btn btn-primary" id="btnDel" onclick="DeleteBtn(this)" >Confirm</a>
        </div>
      </div>
    </div>
</div>