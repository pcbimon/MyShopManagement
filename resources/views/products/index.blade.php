@extends('../layouts.store')
@section('title', 'Products')
@section('content')
<div class="mt-3 d-flex justify-content-between">
    <div><label class="h5">รายการผลิตภัณฑ์ ทั้งหมด XXX รายการ</label></div>
    <div><a class="btn btn-primary text-end" href="{{route('product.create')}}">เพิ่มใหม่</a></div>
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
              <tr>
                <th>1</th>
                <td>ผลิตภัณฑ์ 1</td>
                <td>คำอธิบาย</td>
                <td>
                    <a href="{{route('product.edit',[1])}}" class="btn btn-info"><i class="fas fa-edit"></i> แก้ไข</a>
                </td>
              </tr>
              <tr>
                <th>2</th>
                <td>ผลิตภัณฑ์ 1</td>
                <td>คำอธิบาย</td>
                <td>
                    <a href="{{route('product.edit',[2])}}" class="btn btn-info"><i class="fas fa-edit"></i> แก้ไข</a>
                </td>
              </tr>
              <tr>
                <th>3</th>
                <td>ผลิตภัณฑ์ 1</td>
                <td>คำอธิบาย</td>
                <td>
                    <a href="{{route('product.edit',[3])}}" class="btn btn-info"><i class="fas fa-edit"></i> แก้ไข</a>
                </td>
              </tr>
              <tr>
                <th>4</th>
                <td>ผลิตภัณฑ์ 1</td>
                <td>คำอธิบาย</td>
                <td>
                    <a href="{{route('product.edit',[4])}}" class="btn btn-info"><i class="fas fa-edit"></i> แก้ไข</a>
                </td>
              </tr>
              <tr>
                <th>5</th>
                <td>ผลิตภัณฑ์ 1</td>
                <td>คำอธิบาย</td>
                <td>
                    <a href="{{route('product.edit',[5])}}" class="btn btn-info"><i class="fas fa-edit"></i> แก้ไข</a>
                </td>
              </tr>
            </tbody>
          </table>
    </div>
</div>
@stop
