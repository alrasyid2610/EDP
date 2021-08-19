{{-- 
    Works For       : A component for displaying shipping document data in tabular form
    Param           : @param dataTable - collection - Data collection for display
    Component call  : <x-table-ship-doc :dataTable=""></x-table-ship-doc>
    Example Call    : <x-table-ship-doc :dataTable="$data"></x-table-ship-doc>

--}}
<table class="table table-striped">
    <thead>
    <tr>
        <?php  $no = 1; ?>
        <th>#</th>
        <th>No Po</th>
        <th>Item</th>
        <th>Supplier</th>
        <th>Reciver</th>
        <th>Destination</th>
        <th>Recived Date</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @if (count($dataTable) < 1)

        <tr>
        <td colspan="7" class="text-center" >Data tidak Di temukan</td>
        </tr>
        
    @else
        @foreach ($dataTable as $item)
            <tr id="{{ $item->id }}">
            <td>{{ $no }} </td>
            <td>{{ $item->no_po }}</td>
            <td>{{ $item->item }}</td>
            <td>{{ $item->supplier }}</td>
            <td>{{ $item->reciver }}</td>
            <td>{{ $item->destination }}</td>
            <td>
                @php
                    echo date_format(date_create($item->recived_shipping_date), 'd-m-Y');
                @endphp
            </td>
            <td>
                <a name="" id="" class="btn btn-primary btn-sm" href="{{ route('shipping_documents.show', ['shipping_document' => $item->id]) }}" role="button">View Data</a>                      
                <a name="" id="" class="btn btn-info btn-sm" href="{{ route('shipping_documents.edit', ['shipping_document' => $item->id]) }}" role="button">Edit</a>                      
                <x-com-btn-trigger-modal-delete :dataId="$item->id" :route="$route = 'shipping_documents'" ></x-com-btn-trigger-modal-delete>
            </td>
            </tr>
            <?php $no++; ?>
        @endforeach
    @endif
    
    </tbody>
</table>