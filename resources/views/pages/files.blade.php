@extends('layouts.app')
@section('title')
    File
@endsection
@section('content')
    @include('includes.alert')
    <div class="content-wrapper p-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border border-danger">
                    <div class="card-header px-1 pt-1 pb-0 border-bottom-0">
                        <ul class="nav nav-pills float-left">
                            <li class="nav-item">
                                <a class="nav-link active btn-sm py-1 m-1" data-toggle="pill" href="#fileList">All file</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-sm py-1 m-1" data-toggle="pill" href="#category">All category</a>
                            </li>
                        </ul>

                        <ul class="nav nav-pills float-right">
                            <li class="nav-item">
                                <button class="btn btn-sm btn-primary py-1 m-1" data-toggle="modal"
                                    data-original-title="test" data-target="#addFile">
                                    <i class="fas fa-plus-square nav-icon pr-2"></i>Add file
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="btn btn-sm btn-success btn-sm py-1 m-1" data-toggle="modal"
                                    data-original-title="test" data-target="#addCategory">
                                    <i class="fas fa-plus-square nav-icon pr-2"></i>Add category
                                </button>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body p-1">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="fileList">
                                <h6 class="card-header bg-primary text-center py-1 mx-1">File list</h6>
                                <div class="card-body p-1">
                                    <table class="table table-bordered p-2">
                                        <thead class="bg-info">
                                            <th>Sl</th>
                                            <th>Category</th>
                                            <th>File name</th>
                                            <th>File</th>
                                            <th>Status</th>
                                        </thead>
                                        <tbody>
                                            @forelse ($files  as $key => $item)
                                                <tr>
                                                    <td>{{ ++$key + $fileStartIndex }}</td>
                                                    <td>{!! $item->category->name !!}</td>
                                                    <td>{!! $item->name !!}</td>
                                                    <td>
                                                        <a href="{{ $item->file }}" target="_blank">View</a>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="js-switch status" data-model="files"
                                                            data-field="status" data-id="{{ $item->id }}"
                                                            data-tab="tabName"
                                                            {{ $item->status == 'show' ? 'checked' : '' }} />
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">No users found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    <!-- Pagination Links -->
                                    <div class="d-flex justify-content-center">
                                        {{ $files->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="category">
                                <h6 class="card-header bg-success text-center py-1 mx-1">Category list</h6>
                                <div class="card-body p-1">
                                    <table class="table table-bordered">
                                        <thead class="bg-info">
                                            <th>Sl</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($category as $key => $item)
                                                <tr>
                                                    <td width="30">{{ ++$key }}</td>
                                                    <td>{!! $item->name !!}</td>
                                                    <td>
                                                        <input type="checkbox" class="js-switch status"
                                                            data-model="categories" data-field="status"
                                                            data-id="{{ $item->id }}" data-tab="tabName"
                                                            {{ $item->status == 'show' ? 'checked' : '' }} />
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.addFile')
    @include('pages.addCategory')
@endsection

@section('js')
    <script>
        const fileInput = document.querySelector('#file');
        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 0) {
                const fileName = fileInput.files[0].name;
                const fileNameWithoutExtension = fileName.substring(0, fileName.lastIndexOf('.')) || fileName;
                $("#fileName").val(fileNameWithoutExtension);
            }
        });        
    </script>
@endsection
