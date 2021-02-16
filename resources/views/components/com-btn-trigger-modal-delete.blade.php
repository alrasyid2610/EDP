<input type="submit" onclick="confirmDelete(click)" data-toggle="modal" data-target="#deleteModal"
  data-id="{{ $dataId }}" data-route="{{ route($route . '.destroy', '') }}" class="btn btn-danger btn-sm"
  value="Delete user">
