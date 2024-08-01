@extends('admin.layout.main')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Setting Web</h3>
                    <hr>
                    <form action="{{ url('/admin/setting-web/'.$settingWeb->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <h6>Contact</h6>
                        <input type="text" name="contact" class="form-control mb-3 w-50 @error('contact') is-invalid @enderror" value="{{ $settingWeb->contact }}">
                        @error('contact')
                            <p class="text-danger mt-0">{{ $message }}</p>
                        @enderror
                        <h6>Email</h6>
                        <input type="text" name="email" class="form-control mb-3 w-50 @error('email') is-invalid @enderror" value="{{ $settingWeb->email }}">
                        @error('email')
                            <p class="text-danger mt-0">{{ $message }}</p>
                        @enderror
                        <h6>Instagram</h6>
                        <input type="text" name="instagram" class="form-control mb-3 w-50 @error('instagram') is-invalid @enderror" value="{{ $settingWeb->instagram }}">
                        @error('instagram')
                            <p class="text-danger mt-0">{{ $message }}</p>
                        @enderror
                        <h6>Maps (Embed code)</h6>
                        <input type="text" name="maps" class="form-control mb-3 w-50 @error('maps') is-invalid @enderror" value="{{ $settingWeb->maps }}">
                        @error('maps')
                            <p class="text-danger mt-0">{{ $message }}</p>
                        @enderror
                        <br><br>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection