@extends('admin.layout.app')

@section('section')
    <!-- Begin Page Content -->
    <div class="page-content container">
        <div class="wrapper">
            <div class="row align-items-center">
                <div class="col-md-9 col-7">
                    <div class="page-header">
                        <h3>All Pages </h3>
                    </div>
                </div>

                <div class="col-md-3 col-5">
                    <div class="page_header_btn">
                        <a class="btn btn-primary dropdown-toggle" href="{{ route('admin.pages.create') }}">
                            <i class="fa-solid fa-plus"></i>
                            Add New
                        </a>
                    </div>
                </div>
            </div>

            <div class="whitebox mt-3">
                <table id="example" class="table table-striped nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Page</th>
                            <th>Url</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $page->page_name }}</td>
                                <td>{{ $page->paralink }}</td>
                                <td>{{ $page->status }}</td>
                                <td>
                                    <a href="{{ route('admin.pages.edit', $page->id) }}" class="link-primary"
                                        title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
