@extends('../layouts.store')
@section('title', 'Products')
@section('content')
    <div class="card mt-3">
        <h5 class="card-header">แก้ไขผลิตภัณฑ์รหัส {{$id}}</h5>
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="POST">
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname"
                                        placeholder="ชื่อจริง" value="{{$user->firstname}}">
                                    <label for="firstname">ชื่อจริง</label>
                                    <span class="text-danger">
                                        @error('firstname')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="lastname" name="lastname"
                                        placeholder="นามสกุล" value="{{$user->lastname}}">
                                    <label for="lastname">นามสกุล</label>
                                    <span class="text-danger">
                                        @error('lastname')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="อีเมล"  value="{{$user->email}}">
                                    <label for="email">อีเมล</label>
                                    <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="รหัสผ่าน">
                                    <label for="password">รหัสผ่าน</label>
                                    <span class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
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
                    <a href="{{ route('user.index') }}" class="btn btn-light"><i class="fas fa-arrow-left"></i> ยกเลิก</a>
                </div>
                @if ($user->id > 1)
                <div class="col-md-3">
                    <form action="{{route('user.destroy',$user->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> ลบ</button>
                        </div>
                    </form>
                </div>
                @endif

            </div>
        </div>
    </div>
@stop
