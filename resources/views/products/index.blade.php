@extends('../layouts.store')
@section('title', 'Products')
@section('content')
    <div class="mt-3 d-flex justify-content-between">
        <div><label class="h5">รายการผลิตภัณฑ์ ทั้งหมด {{count($products)}} รายการ</label></div>
        <div><a class="btn btn-primary text-end" href="{{ route('product.create') }}">เพิ่มใหม่</a></div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="col-1">ลำดับ</th>
                        <th>ชื่อผลิตภัณฑ์</th>
                        <th>คำอธิบาย</th>
                        <th class="col-1">แก้ไข</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th>{{$loop->index+1}}</th>
                            <td>{{$product->productName}}</td>
                            <td>{{$product->productDesc}}</td>
                            <td>
                                <a href="{{ route('product.edit', [$product->id]) }}" class="btn btn-info"><i class="fas fa-edit"></i> แก้ไข</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
