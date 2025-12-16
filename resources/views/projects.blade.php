@extends('app')

@section('content')
    <title>Daftar Projects</title>
    <style>
        .action-btn {
            display: inline-block;
            margin-right: 5px;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-green { background-color: #28a745; }
        .btn-red { background-color: #f70c23; }   

    </style>
</head>
<body>

    <h2>Daftar Projects</h2>
    @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
    @endif

    <table border="1" cellpadding="10"  style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{$project->lead->name }}</td>
                <td>{{ $project->product->product_name }}</td>
                <td>Rp {{ number_format($project->product->price) }}</td>
                <td>
                    <span style="font-weight: bold; 
                        color: {{ $project->status == 'approved' ? 'green' : ($project->status == 'rejected' ? 'red' : 'orange') }}">
                        {{ ucfirst($project->status) }}
                    </span>
                </td>

                <td>
                    @if(Auth::user()->isManager() && $project->status == 'pending')
                        
                        <div class="action-btn">
                            <form action="{{ route('leads.approve', $project->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-green" onclick="return confirm('menyetujui project ini?')">
                                    Approve
                                </button>
                            </form>
                        </div>

                        <div class="action-btn">
                            <form action="{{ route('leads.reject', $project->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-red" onclick="return confirm('menolak project ini?')">
                                    Reject
                                </button>
                            </form>
                        </div>

                    @else
                        <span style="color: grey;">
                            {{ $project->status == 'pending' ? 'Menunggu Manager' : 'Selesai' }}
                        </span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection