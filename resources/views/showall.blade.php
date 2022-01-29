@extends('layouts.store')
@section('title', 'All Product')
@section('content')
    <div class="row mt-3">
        @foreach ($products as $product)
        <div class="col-md-3 mb-3">
            <div class="card">
                @if ($product->fileUpload == null)
                    <img style="height: 200px !important;" src="https://via.placeholder.com/200x200?text=No+Photo"
                        class="card-img-top">
                @else
                    <img style="height: 200px !important;" src="{{ asset('/storage/' . $product->fileUpload) }}"
                        class="card-img-top" alt="{{ asset('/storage/' . $product->fileUpload) }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title overflowdot">{{ $product->productName }}</h5>
                    <p class="card-text overflowdot">{{ $product->productDesc }}</p>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#productModal_{{ $product->id }}">Detail</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="productModal_{{ $product->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel_{{ $product->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel_{{ $product->id }}">รายละเอียดผลิตภัณฑ์</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>{{ $product->productName }}</h4>
                                <h1 class="text-info">{{ $product->price }} ฿</h1>
                            </div>
                            <div class="col-md-6">
                                @if ($product->fileUpload == null)
                                    <img style="height: 200px !important;"
                                        src="https://via.placeholder.com/200x200?text=No+Photo" class="card-img-top">
                                @else
                                    <img style="height: 200px !important;"
                                        src="{{ asset('/storage/' . $product->fileUpload) }}" class="card-img-top"
                                        alt="{{ asset('/storage/' . $product->fileUpload) }}">
                                @endif
                            </div>
                        </div>
                        <hr>
                        <label>{{ $product->productDesc }}</label>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@stop
