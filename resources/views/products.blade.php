@extends('app')

@section('content')
<h3>Products</h3>

<table>
    <tr>
        <th>Name</th>
        <th>Speed</th>
        <th>Price</th>
    </tr>

    @foreach ($products as $product)
    <tr>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->speed }}</td>
        <td>{{ $product->price }}</td>
    </tr>
    @endforeach
</table>
@endsection
