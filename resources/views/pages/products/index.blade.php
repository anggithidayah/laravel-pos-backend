@extends('layouts.app')

@section('title', 'Dashboard Propduct')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>List Product</h1>
                <div class="section-header-button">
                    <a href="{{ route('product.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Components</a></div>
                    <div class="breadcrumb-item">Products</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Products</h2>
                <p class="section-lead">Kelola Products</p>

                <div class="row">

                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4></h4>
                                <div class="card-header-action float-right">
                                    <form method="GET" action="{{route('product.index')}}">
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                placeholder="Search" name="name">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table-striped table-md table">
                                        <tr>

                                            <th>Item</th>
                                            <th>Description</th>
                                            <th>price</th>
                                            <th>Stock</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th style="text-align:center;">Action</th>
                                        </tr>
                                        @foreach($products as $a)
                                        <tr>
                                            <td>{{$a->name}}</td>
                                            <td>{{$a->description}}</td>
                                            <td>{{$a->price}}</td>
                                            <td>{{$a->stock}}</td>
                                            <td>{{$a->category}}</td>
                                            <td>
                                                @if ($a->image)
                                                    <img src="{{ asset('storage/products/'.$a->image) }}" alt=""
                                                        width="100px" class="img-thumbnail">
                                                        @else
                                                        <span class="badge badge-danger">No Image</span>

                                                @endif

                                            </td>
                                            <td> <div class="d-flex justify-content-center">
                                                    <a href="{{route('product.edit',$a->id)}}" class="btn btn-sm btn-info btn-icon">
                                                        <i class="fas fa-edit"></i>
                                                        Edit
                                                    </a>

                                                    <form action="{{ route('product.destroy', $a->id) }}" method="POST"
                                                        class="ml-2">
                                                        <input type="hidden" name="_method" value="DELETE" />
                                                        <input type="hidden" name="_token"
                                                            value="{{ csrf_token() }}" />
                                                        <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                            <i class="fas fa-times"></i> Delete
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </table>
                                    <div class="float-right">
                                        {{$products->withQueryString()->links()}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/components-table.js') }}"></script>
@endpush
