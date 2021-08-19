<thead style="background-color: #6c7ae0; color: white">
    <tr>
        <th>ID</th>
        <th>No Po</th>
        <th>No Bon Teknik</th>
        <th>User Penerima</th>
        <th>User Pembuat Bon</th>
        <th>Item</th>
        <th>Section / Dept</th>
        <th>Location</th>
        <th>Fix Asset Status</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @if (count($data) < 1) 
        <tr>
            <td colspan="8" class="text-center">Data tidak Di temukan</td>
        </tr> 
    @else
    @foreach ($data->unique('no_po') as $item)
        <tr 
                @if ($item->sd == 'NG')
                    class="bg-danger2"                    
                @endif
        >
            <td>{{ $item->no_doc }}</td>
            <td>{{ $item->no_po }}</td>
            <td>{{ $item->no_document }}</td>
            <td>{{ $item->reciver }}</td>
            <td>{{ $item->user }}</td>
            <td>{{ $item->item }}</td>
            <td>{{ $item->departement }}</td>
            <td>{{ $item->destination }}</td>
            <td>{{ $item->status }}</td>
            <td>
                {{-- <button class="btn btn-sm btn-primary"> View Data </button> --}}
                <a href="{{ route('goods_come.show', $item->id) }}" class="btn btn-sm btn-primary">View Data</a>   
                {{-- <a href="{{ route('goods_come.destroy', $item->id) }}" class="btn btn-sm btn-danger">Delete</a>    --}}
                    {{-- <form action="{{ route('goods_come.destroy', $item->id) }}" class="d-inline" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="text" name="id" value="{{ $item->id }}">
                        <button name="submit" type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form> --}}
                    <x-com-btn-trigger-modal-delete :dataId="$item->id" :route="$route = 'goods_come'" ></x-com-btn-trigger-modal-delete>
            </td>
            {{-- <td>{{ $item->status }}</td> --}}
        </tr>
    @endforeach
    @endif
</tbody>