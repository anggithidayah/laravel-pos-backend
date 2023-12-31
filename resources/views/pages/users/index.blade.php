@extends('layouts.app')

@section('title', 'Dashboard User')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>List Users</h1>
                <div class="section-header-button">
                    <a href="{{ route('user.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Components</a></div>
                    <div class="breadcrumb-item">Users</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Users</h2>
                <p class="section-lead">Kelola Users Sistem</p>

                <div class="row">

                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4></h4>
                                <div class="card-header-action float-right">
                                    <form method="GET" action="{{route('user.index')}}">
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

                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                            <th>Phone</th>
                                            <th style="text-align:center;">Action</th>
                                        </tr>
                                        @foreach($users as $a)
                                        <tr>
                                            <td>{{$a->name}}</td>
                                            <td>{{$a->email}}</td>
                                            <td>{{$a->created_at}}</td>
                                            <td>{{$a->phone}}</td>
                                            <td> <div class="d-flex justify-content-center">
                                                    <a href="{{route('user.edit',$a->id)}}" class="btn btn-sm btn-info btn-icon">
                                                        <i class="fas fa-edit"></i>
                                                        Edit
                                                    </a>

                                                    <form action="{{ route('user.destroy', $a->id) }}" method="POST"
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
                                        {{$users->withQueryString()->links()}}
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
