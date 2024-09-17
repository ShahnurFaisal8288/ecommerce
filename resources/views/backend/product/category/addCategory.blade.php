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
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>John Doe</td>
                                                <td>Developer</td>
                                                <td>New York</td>
                                                <td>30</td>
                                                <td>2021/01/01</td>
                                                <td>$100,000</td>
                                            </tr>
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
                       <div class="">
                        <label for="name"><strong>Name</strong></label>
                        <input type="text" name="name" id="name" class="form-control">
                       </div>
                       <div class="">
                        <label for="name"><strong>Description</strong></label>
                        <textarea name="description" id="description" cols="30" rows="6" class="form-control"></textarea>
                       </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable1').DataTable({
                "dom": '<"top"f>rt<"bottom"lip>',
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search..."
                }
            });
        });
    </script>
@endpush