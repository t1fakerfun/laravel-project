@extends('layouts.myapp')

@section('content')
<div class="container">
    <h1>製品一覧</h1>
    <!-- 検索フォーム -->
     <form method="GET" action="{{ route('products.index') }}">
        <div class="form-group">
            <input type="text" name="searchword" value="{{ request('searchword') }}" class="form-control" placeholder="製品名で検索">
        </div>
        <button type="submit" class="btn btn-primary">検索</button>
    </form>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>名前</th>
                <th>説明</th>
                <th>カテゴリー</th>
                <th>作成日</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->category ? $product->category->name : 'カテゴリーなし'}}</td>
                <td>{{ $product->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->appends(['searchword' =>request('searchword')]) ->links() }}
</div>
@endsection