@extends('backend.layout.app')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/datable.css') }}">
   
@endpush

@section('content')
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
        <main class="mdl-layout__content ui-list-components">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
                    <div class="mdl-card">
                        <div class="mdl-card__title">
                            <h5 class="mdl-card__title-text text-color--white">List components</h5>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="list-title text-color--smooth-gray">SIMPLE LIST</span>
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                                            Add Category
                                        </button>
                                    </div>
                                    <table id="dataTable1" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($category as $categories)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $categories->name }}</td>
                                                <td>{{ $categories->description }}</td>
                                                <td>{{ $categories->status }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $categories->id }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('category.destroy',$categories->id ) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>
    
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal_width">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label"><strong>Name</strong></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label"><strong>Description</strong></label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="flexSwitchCheckDefault" class="form-check-label"><strong>Status</strong></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="status" value="active">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>
    <!-- Edit Category Modal -->
    <!-- Edit Category Modal -->
@foreach ($category as $categories)
<div class="modal fade" id="editCategoryModal{{ $categories->id }}" tabindex="-1" aria-labelledby="editCategoryModalLabel{{ $categories->id }}" aria-hidden="true">
    <div class="modal-dialog modal_width">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel{{ $categories->id }}">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('category.update', $categories->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label"><strong>Name</strong></label>
                        <input type="text" name="name" id="name{{ $categories->id }}" class="form-control" value="{{ $categories->name }}" placeholder="Enter category name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label"><strong>Description</strong></label>
                        <textarea class="form-control" name="description" id="description{{ $categories->id }}" cols="30" rows="10">{{ $categories->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="flexSwitchCheckDefault{{ $categories->id }}" class="form-check-label"><strong>Status</strong></label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault{{ $categories->id }}" name="status" value="active" {{ $categories->status == 'active' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable1').DataTable({
                "dom": '<"top"f>rt<"bottom"lpi>',
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search..."
                },
                "lengthMenu": [5, 10, 25, 50],
                "pagingType": "simple_numbers",
            });
        });
    </script>

@endpush