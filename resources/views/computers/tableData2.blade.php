<thead style="background-color: #6c7ae0; color: white">
    <tr>
        {{-- <th>User Name</th> --}}
        <th>PC Name</th>
        <th>IP</th>
        <th>Operation System</th>
        {{-- <th>Section / Dept</th> --}}
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
            {{-- <td>{{ $item->name }}</td> --}}
            <td>{{ $value->pc_name }}</td>
            <td>{{ $value->ip }}</td>
            <td>{{ $value->operating_system }}</td>
            {{-- <td>{{ $value->section }}</td> --}}
            <td>{{ $value->location }}</td>
            <td>{{ $value->computer_operation }}</td>
            <td>
                {{-- <span class="badge badge-pill badge-primary">{{ $data_persen[$key] }}%</span> --}}
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $data_persen[$key] }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $data_persen[$key] }}%</div>
                </div>
            </td>
            <td>{{ $value->created_at }}</td>
            <td>
                <a class="btn btn-sm btn-primary text-white" href="{{ route('computers.show', ['computer' => $value->id]) }}?flag=computer_incomplete">View Data</a>
                <a class="btn btn-sm btn-success btn-light px-2" href="{{ route('computers.edit', $value->id) }}?flag=computer_incomplete"><i class="fa fa-pencil text-white"></i></a>
                {{-- <form action="{{ route('computers.edit', ['computer' => $value->id]) }}" class="d-inline">
                    <button class="btn btn-sm btn-success">Edit</button>
                </form> --}}
            </td>
        </tr>
    @endforeach
</tbody>