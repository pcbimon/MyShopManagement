@extends('../layouts.store')
@section('title', 'Products')
@section('content')
    <div class="card mt-3">
        <h5 class="card-header">สร้างผลิตภัณฑ์ใหม่</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="ชื่อจริง">
                                <label for="firstname">ชื่อจริง</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="นามสกุล">
                                <label for="lastname">นามสกุล</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="email" name="email" placeholder="อีเมล">
                                <label for="email">อีเมล</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="รหัสผ่าน">
                                <label for="productname">รหัสผ่าน</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-success">บันทึก</button>
                    <a href="{{ route('user.index') }}" class="btn btn-default">ยกเลิก</a>
                </div>
            </div>
        </div>
    </div>
@stop
