<thead>
  <tr> <?php $no = 1; ?> <th>#</th>
        <th>No Bon</th>
        <th>User</th>
        <th>Item</th>
        <th>Departement</th>
        <th>Description</th>
        <th>Document Recipient</th>
        <th>Recived Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
</thead>
<tbody> 
  @if (count($data) < 1) <tr>
    <td colspan="8" class="text-center">Data tidak Di temukan</td>
    </tr> @else
    @foreach ($data as $item) 
      <tr>
        <td>{{ $no }}</td>
        <td>{{ $item->no_document }}</td>
        <td>{{ $item->user }}</td>
        <td>{{ $item->item }}</td>
        <td>{{ $item->departement }}</td>
        <td>{{ $item->description }}</td>
        <td>{{ $item->document_recipient }}</td>
        <td>{{ $item->recived_date }}</td>
        <td>
            @if ($item->status == 'incomplete')
            {{-- incomplete --}}
                <span class="badge badge-pill badge-danger p-2">
                    {{ $item->status }}
                </span>
            @else 
                {{-- complete --}}
                <span class="badge badge-pill badge-success p-2"> {{ $item->status }} </span>
            @endif
        </td>
        <td>
          <a name="" id="" class="btn btn-primary btn-sm"
            href="{{ route('technical_documents.edit', ['technical_document' => $item->id]) }}" role="button">Edit</a>
          {{-- <x-com-btn-trigger-modal-delete :dataId="$item->id" :route="$route = 'technical_documents'">
          </x-com-btn-trigger-modal-delete> --}}
        </td>
      </tr> <?php $no++; ?> 
    @endforeach 
  @endif 
</tbody>