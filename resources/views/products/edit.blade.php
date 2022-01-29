@extends('../layouts.store')
@section('title', 'Products')
@section('content')
    <div class="card mt-3">
        <h5 class="card-header">แก้ไขผลิตภัณฑ์รหัส {{$id}}</h5>
        <div class="card-body">
            <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('productname') is-invalid @enderror" id="productname" name="productname"
                                placeholder="ชื่อผลิตภัณฑ์" value="{{$product->productName}}">
                            <label for="productname">ชื่อผลิตภัณฑ์</label>
                            <span class="text-danger">
                                @error('productname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="ราคา" value="{{$product->price}}">
                            <label for="price">ราคา</label>
                            <span class="text-danger">
                                @error('price')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('productdesc') is-invalid @enderror" placeholder="คำอธิบายผลิตภัณฑ์" id="productdesc"
                                name="productdesc" style="height: 100px">{{$product->productDesc}}</textarea>
                            <label for="productdesc">คำอธิบายผลิตภัณฑ์</label>
                            <span class="text-danger">
                                @error('productdesc')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="fileUpload" class="form-label">รูปตัวอย่าง</label>
                            <input onchange="preview_image(event)" class="form-control @error('fileUpload') is-invalid @enderror" type="file" id="fileUpload" name="fileUpload" accept="image/png, image/jpeg" >
                            <span class="text-danger">
                                @error('fileUpload')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center align-self-center">
                        @if ($product->fileUpload == null)
                            <img id="previewImage" src="https://via.placeholder.com/300x300?text=Example+Image" width="300" height="300">
                        @else
                            <img id="previewImage" src="{{asset('/storage/'.$product->fileUpload)}}" width="300" height="300">
                        @endif

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 d-grid">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-3 d-grid">
                    <a href="{{ route('product.index') }}" class="btn btn-light"><i class="fas fa-arrow-left"></i> ยกเลิก</a>
                </div>
                <div class="col-md-3">
                    <form action="{{route('product.destroy',$product->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> ลบ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('previewImage');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@stop
