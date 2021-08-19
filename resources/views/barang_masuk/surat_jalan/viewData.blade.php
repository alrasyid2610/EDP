<table class="table table-striped">
  <thead>
    <tr>
      <?php  $no = 1; ?>
      <th>#</th>
      <th>No Po</th>
      <th>Supplier</th>
      <th>Penerima</th>
      <th>Tujuan</th>
      <th>Tanggal Terima</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @if (count($data) < 1)

      <tr>
        <td colspan="7" class="text-center" >Data tidak Di temukan</td>
      </tr>
        
    @else
        @foreach ($data as $item)
        <tr>

          <td>{{ $no }}</td>
          <td>{{ $item->no_po }}</td>
          <td>{{ $item->supplier }}</td>
          <td>{{ $item->reciver }}</td>
          <td>{{ $item->destination }}</td>
          <td>{{ $item->recived_shipping_date }}</td>
          <td>
            <a name="" id="" class="btn btn-primary btn-sm" href="{{ route('shipping_documents.edit', ['shipping_document' => $item->id]) }}"
              role="button">Edit</a>
            {{-- <input type="submit"  onclick="confirmDelete(click)" data-toggle="modal" data-target="#deleteModal" data-id="{{ $item->id }}"
            data-route="{{ route('surat_jalan.destroy', '') }}" class="btn btn-danger btn-sm" value="Delete user"> --}}
            <x-com-btn-trigger-modal-delete :dataId="$item->id" :route="$route = 'shipping_documents'"></x-com-btn-trigger-modal-delete>
          </td>
        </tr>
          <?php $no++; ?>
        @endforeach
    @endif
    
  </tbody>
</table>



