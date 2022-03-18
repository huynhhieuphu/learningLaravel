{{-- kế thừa toàn bộ layout chính --}}
@extends('layout.main_layout')

{{-- Định nghĩa css/script nhúng  --}}
@push('style')
    <style>
        .text-brown{
            color: brown;
        }
    </style>
@endpush

@push('script')
    <script>
        console.log('code javascript');
    </script>>
@endpush

{{-- định nghĩa nội dung sẽ nhúng --}}
@section('main')
<h1>This is Dashboard page</h1>

<h3 class="text-brown">{{ $title }}</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product['id'] }}</td>
            <td>{{ $product['productName'] }}</td>
            <td>{{ number_format($product['price'])}} VND</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection