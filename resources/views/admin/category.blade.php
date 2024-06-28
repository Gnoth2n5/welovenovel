<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    @include('admin.css')

    <style>
        input[type=text] {
            width: 300px;
            line-height: 30px;
            padding-left: 5px;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('admin.header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('admin.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="mt-3 ml-3">

                <form action="{{ url('add_category') }}" method="post">
                    @csrf

                    <div>
                        <input type="text" name="category" required>

                        <input type="submit" value="Add Categoty" class="btn btn-outline-success">
                    </div>

                </form>

                <div class="table-responsive mt-2">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Create Time</th>
                                <th scope="col">Update Time</th>
                                <th scope="col">Function</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($category as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->category_name }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td>{{ $value->updated_at }}</td>
                                    <td>
                                        <a href="#" class="btn btn-outline-primary edit-btn"
                                            data-category-id="{{ $value->id }}"
                                            data-category-name="{{ $value->category_name }}">Edit</a>
                                        <a href="{{ url('delete_category', $value->id) }} "
                                            class="btn btn-outline-danger" onclick="confirmDelete(event)">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>

            <div id="edit-form" style="display: none;">
                <form action="{{ url('update_category') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="category_name">Category Name:</label>
                        <input type="text" class="form-control" id="category_name" name="category_name">
                        <input type="text" id="category_id" name="category_id" hidden>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" id="cancel-btn" class="btn btn-secondary">Cancel</button>
                </form>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include('admin.footer')
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- Sweet Alert CDN -->
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            var urlToRedirect = event.currentTarget.getAttribute('href');
            console.log(urlToRedirect);

            swal({
                    title: "Are you sure to Delete This??",
                    text: "This delete will be parmament",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })

                .then((willCancel) => {
                    if (willCancel) {
                        window.location.href = urlToRedirect;
                    }
                })
        }
        // JavaScript
        $(document).ready(function() {
            $('.edit-btn').click(function() {
                event.preventDefault();
                var categoryName = $(this).data('category-name');
                var categoryId = $(this).data('category-id');
                $('#category_name').val(categoryName);
                $('#category_id').val(categoryId);
                $('#edit-form').show();
            });

            $('#cancel-btn').click(function() {
                $('#edit-form').hide();
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    @include('admin.js')
</body>

</html>
