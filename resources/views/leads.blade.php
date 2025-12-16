@extends('app')

@section('content')
<h3>List Leads</h3>
<a href="{{ url('/leads/create') }}">Tambah Leads Baru</a>

    @foreach($leads as $lead)
    <div class="card" style="margin-bottom: 20px; padding: 15px; border: 4px">
        <h3>{{ $lead->name }} ({{ $lead->email }})</h3>
        <div style="padding: 10px; border-radius: 5px;">
            <strong>Buat Project:</strong>
            
            <form action="{{ route('projects.storeFromLead', $lead->id) }}" method="POST">
                @csrf
                
                <select name="product_id" required style="padding: 5px;">
                    <option value="">Pilih Produk</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">
                            {{ $product->name }} ({{($product->product_name) }})
                        </option>
                    @endforeach
                </select>

                <button type="submit" style="background-color: #2563eb; color: white; padding: 5px 10px; border: none; border-radius: 3px; cursor: pointer;">
                    Buat Project
                </button>
            </form>
        </div>
    </div>
    @endforeach
@endsection
