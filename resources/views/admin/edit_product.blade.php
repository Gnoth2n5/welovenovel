<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    @include('admin.css')
    <style>
        select {
            width: 200px;
            height: 30px;
        }

        .editproduct-form {
            width: 600px;
            margin-left: 20px;
            margin-top: 20px;
        }

        .editproduct-form div {
            margin-bottom: 10px;
        }

        label {
            display: inline-block;
            width: 200px;
            font-size: 15px;
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

            <div class="editproduct-form">
                <form action="{{ url('update_product', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="title">Product Title:</label>
                        <input type="text" class="form-control" name="title" value="{{ $product->title }}">
                    </div>

                    <div>
                        <label for="description">Description:</label>
                        <textarea name="description" id="" class="form-control" rows="10">{{ $product->description }}</textarea>
                    </div>

                    <div>
                        <label for="price">Price:</label>
                        <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                    </div>

                    <div>
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="qty" class="form-control" value="{{ $product->quantity }}">
                    </div>

                    <div>
                        <label for="category">Product Category:</label>
                        <select name="category" id="">
                            <option value="{{ $product->category }}">{{ $product->category }}</option>

                            @foreach ($category as $item)
                                <option value="{{ $item->category_name }}">{{ $item->category_name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div>
                        <label for="image">Current Image:</label>
                        <img src="/images/products/{{ $product->image }}"
                            class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                            alt="" width="50%">
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div>
                        <input type="submit" class="btn btn-outline-success" value="Update Product">
                        <a href="{{ url()->previous() }}" class="btn btn-outline-dark">Cancel</a>
                    </div>
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
    <!-- All Jquery -->
    <!-- ============================================================== -->
    @include('admin.js')
</body>

</html>
