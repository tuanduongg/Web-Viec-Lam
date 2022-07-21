@extends('client.master')
@section('main')
    <div class="container">
        <div class="row mb-10">
            <div class="col-12">
                <div class="card">
                    <div class="card-header " style="background-color: #1f2b7b;">
                        <h5 class="card-title" style="color: white;">Sửa Bài Đăng #{{ $post->id }}</h5>
                    </div>
                    {{-- @if (session()->has('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif --}}

                    <form action="{{ route('posts.update', $post) }}" id="" method="post" id="form-create-post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="job_tittle">Tiêu Đề Hiển Thị</label>
                                <input required placeholder="Tiêu Đề Không Quá 40 Ký Tự" value="{{ $post->job_tittle }}"
                                    name="job_tittle" type="text" class="form-control">
                                @error('job_tittle')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="city">Thành Phố</label>
                                        <input required placeholder="Ví dụ: Bắc Giang" value="{{ $post->city }}"
                                            name="city" type="text" class="form-control">
                                        @error('city')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="number_applicants">Số Lượng</label>
                                        <input required name="number_applicants" value="{{ $post->number_applicants }}"
                                            type="number" class="form-control">
                                        @error('number_applicants')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="row  justify-content-around">
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remote"
                                            @if ($post->remote == 1) checked @endif id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Remote
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="parttime"
                                            @if ($post->parttime == 1) checked @endif id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Part Time
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="language">Ngôn Ngữ</label>
                                        <select name="language" required class="form-select" id="select-language"
                                            aria-label="Default select example">
                                            @foreach ($languages as $item)
                                                <option value="{{ $item }}"
                                                    @if ($post->language === $item) selected @endif>{{ $item }}
                                                </option>
                                            @endforeach

                                        </select>
                                        @error('language')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="salary">Lương</label>
                                        <input required name="salary" type="text" value="{{ $post->salary }}"
                                            class="form-control ">
                                        @error('salary')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="summernote">Mô Tả Chi Tiết</label>
                                        <textarea class="form-control" id="summernote" name="description" rows="3">{{ $post->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-12">
                                    <button type="submit" class="genric-btn primary">Lưu Thay Đổi</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('client.js')
    <script>
        @if (session()->has('success'))
            showAlertError("{{ session()->get('success') }}", '');
        @endif
    </script>
@endpush
