@extends('app')

@section('content')

<h2>Data Pelanggan Berlangganan</h2>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Kontak</th>
                <th>List Layanan</th>
                <th>Total Belanja</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td style="vertical-align: top;">
                    <strong>{{ $customer->name }}</strong>
                </td>
                
                <td style="vertical-align: top;">
                    {{ $customer->email }}<br>
                </td>

                <td>
                    @if($customer->projects->count() > 0)
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach($customer->projects as $project)
                                <li style="margin-bottom: 5px;">
                                    <small>{{($project->product->product_name) }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <span style="color: grey;">Belum ada layanan aktif</span>
                    @endif
                </td>

                <td style="vertical-align: top">
                    Rp {{ number_format($customer->projects->sum(function($project) {
                        return $project->product ? $project->product->price : 0;
                    })) }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
