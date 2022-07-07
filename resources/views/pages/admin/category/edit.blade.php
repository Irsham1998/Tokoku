@extends('layouts.admin')

@section('title')
Store Category Edit
@endsection

@section('content')
<!--section content open-->
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
    <div class="dashboard-heading">
        <h2 class="dashboard-title">Category</h2>
        <p class="dashboard-subtitle">
            Edit "{{ $item->name }}" Category
        </p>
    </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('category.update', $item->id) }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Kategori</label>
                                            <input type="text" class="form-control" name="name" required value="{{ $item->name }}"/>
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" name="photo" class="form-control">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                        <button
                                            type="submit"
                                            class="btn btn-success px-5"
                                        >
                                            Update Now
                                        </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
<!--section content close-->
@endsection


