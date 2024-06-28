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

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .typeahead.dropdown-menu {
            width: 100%;
            background-color: #f3f3f3;
            border-radius: 10px;
            animation: fadeIn 0.15s ease-in;
        }

        .typeahead.dropdown-menu>li>a {
            color: #495057;
            padding: 10px 15px;
            line-height: 20px;
        }

        .typeahead.dropdown-menu>li.active>a,
        .typeahead.dropdown-menu>li>a:hover {
            background-color: #420489;
            color: #ffffff;
            border-radius: 10px;
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
            <div class="mt-3 ml-3 mr-3">

                <div class="table-responsive mt-2">
                    <table class="table">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col" width="5%">ID</th>
                                <th scope="col" width="15%">Title</th>
                                <th scope="col" width="25%">Description</th>
                                <th scope="col" width="11%">Category</th>
                                <th scope="col" width="11%">Price</th>
                                <th scope="col" width="9%">Quantity</th>
                                <th scope="col" width="13%">Image</th>
                                <th scope="col" width="11%">Function</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($product as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>
                                        <textarea name="" id="" cols="12" rows="5" disabled>{{ $value->title }}</textarea>
                                    </td>
                                    <td>
                                        <textarea name="" id="" cols="25" rows="5" disabled>{{ $value->description }}</textarea>
                                    </td>
                                    <td>{{ $value->category }}</td>
                                    <td>{{ $value->price }}</td>
                                    <td>{{ $value->quantity }}</td>
                                    <td>
                                        <img src="images/products/{{ $value->image }}"
                                            class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                                            alt="">
                                    </td>
                                    <td>
                                        <a href="{{ url('edit_product', $value->id) }}"
                                            class="btn btn-outline-primary edit-btn w-100">Edit</a>
                                        <a href="{{ url('delete_product', $value->id) }} "
                                            class="btn btn-outline-danger w-100"
                                            onclick="confirmDelete(event)">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center align-items-center">
                    {{ $product->links() }}
                </div>
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
