<table class="table table-striped">
  <thead>
    <tr>
      <?php $no = 1; ?>
      <th>#</th>
      <th>No Bon</th>
      <th>User</th>
      <th>Dept</th>
      <th>Keterangan</th>
      <th>Penerima Bon</th>
      <th>Tanggal Terima</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @if (count($data) < 1)

      <tr>
        <td colspan="8" class="text-center">Data tidak Di temukan</td>
      </tr>

    @else
      @foreach ($data as $item)
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $item->no_bon }}</td>
          <td>{{ $item->user }}</td>
          <td>{{ $item->dept }}</td>
          <td>{{ $item->keterangan }}</td>
          <td>{{ $item->penerima_bon }}</td>
          <td>{{ $item->tgl_terima_bon }}</td>
          <td>
            <a name="" id="" class="btn btn-primary btn-sm"
              href="{{ route('bon_teknik.edit', ['bon_teknik' => $item->id]) }}" role="button">Edit</a>
            <x-com-btn-trigger-modal-delete :dataId="$item->id" :route="$route = 'bon_teknik'">
            </x-com-btn-trigger-modal-delete>
          </td>
        </tr>
        <?php $no++; ?>
      @endforeach
    @endif

  </tbody>
</table>
