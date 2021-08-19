<thead style="background-color: #6c7ae0; color: white">
    <tr>
        <th>User Name</th>
        <th>PC Name</th>
        <th>IP</th>
        <th>Operation System</th>
        <th>Section / Dept</th>
        <th>Location</th>
        <th>Computer Operation</th>
        <th>Status Data</th>
        <th>Created At</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($data as $key => $value)
        <tr>
            <td>{{ $value->name }}</td>
            <td>{{ $value->pc_name }}</td>
            <td>{{ $value->ip }}</td>
            <td>{{ $value->operating_system }}</td>
            <td>{{ $value->section }}</td>
            <td>{{ $value->location }}</td>
            <td>{{ $value->computer_operation }}</td>
            <td>
                {{-- <span class="badge badge-pill badge-primary">{{ $data_persen[$key] }}%</span> --}}
                <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{ $data_persen[$key] }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $data_persen[$key] }}%</div>
                </div>
            </td>
            <td>{{ $value->created_at }}</td>
            <td>
                <a class="btn btn-sm btn-primary text-white" href="{{ route('computers.show', ['computer' => $value->id]) }}"><i class="fa fa-eye"></i> </a>
                <form action="{{ route('computers.edit', ['computer' => $value->id]) }}" class="d-inline">
                    {{-- @csrf --}}
                    <button class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>