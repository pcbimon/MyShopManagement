@extends('../layouts.store')
@section('title', 'Products')
@section('content')
    <div class="card mt-3">
        <h5 class="card-header">สร้างผลิตภัณฑ์ใหม่</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="productname" name="productname" placeholder="ชื่อผลิตภัณฑ์">
                        <label for="productname">ชื่อผลิตภัณฑ์</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="price" name="price" placeholder="ราคา">
                        <label for="price">ราคา</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="คำอธิบายผลิตภัณฑ์" id="productdesc" name="productdesc"
                            style="height: 100px"></textarea>
                        <label for="productdesc">คำอธิบายผลิตภัณฑ์</label>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">รูปตัวอย่าง</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="https://via.placeholder.com/300x300?text=Example+Image" class="h-100" alt="...">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-success">บันทึก</button>
                    <a href="{{ route('product.index') }}" class="btn btn-default">ยกเลิก</a>
                </div>
            </div>
        </div>
    </div>
@stop
