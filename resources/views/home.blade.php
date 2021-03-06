@extends('layouts.store')
@section('title', 'Home')
@section('content')
    <style>
        .productDesc {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .overflowdot{
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

    </style>
    @if (count($products) > 0)
        <div class="row mb-3">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        @if ($products[0]->fileUpload == null)
                            <img src="https://via.placeholder.com/1300x400?text=No+Photo" class="d-block w-100" alt="...">
                        @else
                            <img src="{{$products[0]->fileUpload}}" class="d-block w-100" alt="...">
                        @endif
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{$products[0]->productName}}</h5>
                            <p class="overflowdot">{{$products[0]->productDesc}}</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        @if ($products[1]->fileUpload == null)
                            <img src="https://via.placeholder.com/1300x400?text=No+Photo" class="d-block w-100" alt="...">
                        @else
                            <img src="{{$products[1]->fileUpload}}" class="d-block w-100" alt="...">
                        @endif
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{$products[1]->productName}}</h5>
                            <p class="overflowdot">{{$products[1]->productDesc}}</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        @if ($products[2]->fileUpload == null)
                            <img src="https://via.placeholder.com/1300x400?text=No+Photo" class="d-block w-100" alt="...">
                        @else
                            <img src="{{$products[2]->fileUpload}}" class="d-block w-100" alt="...">
                        @endif
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{$products[2]->productName}}</h5>
                            <p class="overflowdot">{{$products[2]->productDesc}}</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    @else
        <img src="https://via.placeholder.com/1300x400/e0ff7a/0d0d0d/?text=Waiting+Product" class="d-block w-100"
            alt="...">
    @endif
    @if (count($products) > 0)
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">????????????????????????????????????????????????</h5>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        @if ($product->fileUpload == null)
                                            <img style="height: 200px !important;"
                                                src="https://via.placeholder.com/200x200?text=No+Photo"
                                                class="card-img-top">
                                        @else
                                            <img style="height: 200px !important;"
                                                src="{{ asset('/storage/' . $product->fileUpload) }}"
                                                class="card-img-top"
                                                alt="{{ asset('/storage/' . $product->fileUpload) }}">
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
                                                <h5 class="modal-title" id="exampleModalLabel_{{ $product->id }}">
                                                    ?????????????????????????????????????????????????????????</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4>{{ $product->productName }}</h4>
                                                        <h1 class="text-info">{{ $product->price }} ???</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        @if ($product->fileUpload == null)
                                                            <img style="height: 200px !important;"
                                                                src="https://via.placeholder.com/200x200?text=No+Photo"
                                                                class="card-img-top">
                                                        @else
                                                            <img style="height: 200px !important;"
                                                                src="{{ asset('/storage/' . $product->fileUpload) }}"
                                                                class="card-img-top"
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
                            @if (count($products) == 7)
                                {{-- Last item --}}
                                <div class="col-md-3 mb-3">
                                    <div class="card h-100">
                                        <div class="row align-items-center h-100">
                                            <div class="col-6 mx-auto">
                                                <a href="{{ route('showall') }}" class="stretched-link">
                                                    <h3 class="align-self-center text-center">
                                                        <label>More <i class="fas fa-angle-double-right"></i></label>
                                                    </h3>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@stop
