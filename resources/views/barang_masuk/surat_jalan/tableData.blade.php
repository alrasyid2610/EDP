<thead>
<tr>
    <?php  $no = 1; ?>
    <th>No DOC</th>
    <th>No Po</th>
    <th>Item</th>
    <th>Qty</th>
    <th>Supplier</th>
    <th>Reciver</th>
    <th>Destination</th>
    <th>Recived Date</th>
    <th>Status</th>
    <th>Barcode</th>
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
    <tr id="{{ $item->id }}" class="
        <?php 
            if ($item->status_all_data == 'NG') {
                echo "bg-danger2";
            } else {
                echo "bg-success2";
            }
        ?>
    ">
        <td>{{ $item->id }}</td>
        <td>{{ $item->no_po }}</td>
        <td>{{ $item->item }}</td>
        <td>{{ $item->qty }}</td>
        <td>{{ $item->supplier }}</td>
        <td>{{ $item->reciver }}</td>
        <td>{{ $item->destination }}</td>
        <td>
            @php
                echo date_format(date_create($item->recived_shipping_date), 'd-m-Y');
            @endphp
        </td>
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
            {!! QrCode::size(80)->backgroundColor(255,255,255)->generate($item->no_po) !!}
        </td>
        <td>
            <a name="" id="" class="btn btn-primary btn-sm" href="{{ route('shipping_documents.show', ['shipping_document' => $item->id]) }}" role="button">View Data</a>                      
            <a name="" id="" class="btn btn-info btn-sm" href="{{ route('shipping_documents.edit', ['shipping_document' => $item->id]) }}" role="button">Edit</a>
            @if ($item->status == 'incomplete')
            {{-- incomplete --}}
            <x-com-btn-trigger-modal-delete :dataId="$item->id" :route="$route = 'shipping_documents'" ></x-com-btn-trigger-modal-delete>
            @endif
            <a name="" id="" class="btn btn-warning btn-sm" href="{{ route('shipping_documents.mark', ['id' => $item->id, 'status_all_data' => $item->status_all_data]) }}" role="button">Mark</a>
        </td>
    </tr>
        <?php $no++; ?>
    @endforeach
@endif

</tbody>