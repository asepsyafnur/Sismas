@extends('admin/templates/v_default')
@section('title', 'Ippmp | profile')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 col-md-6 m-auto">
                <div class="card card-widget widget-user shadow mt-4">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username text-capitalize">{{ $user->name }}</h3>
                        <h5 class="widget-user-desc text-capitalize">{{ $user->level }}</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="{{ asset('img_users/' . $user->image) }}" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col border-right">
                                <div class="register-card-body">
                                    <form action="{{ url('profile/' . $user->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama" value="{{ $user->name }}">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>*{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-3">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" placeholder="Email">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>*{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">ganti gambar profile</label>
                                                </div>
                                            </div>
                                            @error('image')
                                                <div class="text-danger">
                                                <strong style="font-size:13px;">*{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-4 ml-auto">
                                                <button type="submit" class="btn btn-primary btn-block">Update</button>
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
    </div>
</section>
@endSection('content')
@section('script')
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endSection('script')