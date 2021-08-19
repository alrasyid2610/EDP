{{-- 
    Works For       : The component for this delete button triggers a modal delete on the shipping document page
    Param           : @param dataId - int - The id of record / data to be deleted
                      @param route - route(String) - Specifies the route for the delete process 
    Component call  : <x-com-btn-trigger-modal-delete :dataId="" :route="$route = ''" ></x-com-btn-trigger-modal-delete>
    Example Call    : <x-com-btn-trigger-modal-delete :dataId="$item->id" :route="$route = 'shipping_documents'" ></x-com-btn-trigger-modal-delete>

--}}

<input type="submit" data-toggle="modal" data-target="#deleteModal"
  data-id="{{ $dataId }}" data-route="{{ route($route . '.destroy', '') }}" class="btn btn-danger btn-sm"
  value="Delete">
