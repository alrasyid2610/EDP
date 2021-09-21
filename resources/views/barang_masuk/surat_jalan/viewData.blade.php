<table class="table table-striped">
    <thead>
        <tr>
            <?php $no = 1; ?>
            <th>No Doc</th>
            <th>No Po</th>
            <th>Item</th>
            <th>Qty</th>
            <th>Supplier</th>
            <th>Reciver</th>
            <th>Destination</th>
            <th>Recived Date</th>
            <th>Status</th>
            <th style="width: 20%">Action</th>
        </tr>
    </thead>
    <tbody>
        @if (count($data) < 1)

            <tr>
                <td colspan="7" class="text-center">Data tidak Di temukan</td>
            </tr>

        @else
            @foreach ($data as $item)
                <tr id="{{ $item->id }}">
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
                        <span class="badge badge-pill badge-danger p-2"> {{ $item->status }} </span>
                    </td>
                    <td>
                        <a href="{{ route('technical_documents.create2', ['id_surat_jalan' => $item->id]) }}" class="btn btn-primary btn-sm">Lengkapi Surat Jalan</a>
                        <a name="" id="" class="btn btn-info btn-sm" href="{{ route('shipping_documents.edit', ['shipping_document' => $item->id]) }}" role="button">Edit</a>


                        {{-- <form action="" class="d-inline" method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <input type="hidden" name="id" value="{{ $item->id }}">

                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form> --}}
                        {{-- <form action="{{ route('technical_documents.create2', ['id_surat_jalan' => $item->id ]) }}" method="POST"> @csrf <input
                                                  type="hidden" value="{{ $item->id }}" name="id_surat_jalan">
                                                <button class="btn btn-primary btn-sm" type="submit">Lengkapi Surat Jalan</button>
                                              </form> --}}
                        <x-com-btn-trigger-modal-delete :dataId="$item->id" :route="'shipping_documents'"></x-com-btn-trigger-modal-delete>
                    </td>
                </tr>
                <?php $no++; ?>
            @endforeach
        @endif

    </tbody>
</table>
