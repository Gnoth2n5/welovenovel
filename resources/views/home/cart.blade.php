<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

    </div>

    {{--  cart section start  --}}
    <section class="bg-light my-5">
        <div class="container">
            <div class="row">
                <!-- cart -->
                <div class="col-lg-9">
                    <div class="card border shadow-0">
                        <div class="m-4">
                            <h4 class="card-title mb-4">Your shopping cart</h4>
                            {{-- item on cart --}}
                            @foreach ($cart as $item)
                                <div class="row gy-3 mb-4">
                                    <div class="col-lg-5">
                                        <div class="me-lg-5">
                                            <div class="d-flex">
                                                <img src="/images/products/{{ $item->product->image }}"
                                                    class="border rounded me-3"
                                                    style="width: 96px; height: 96px; object-fit: cover;" />
                                                <div class="">
                                                    <a href="#" class="nav-link">{{ $item->product->title }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                        <div class="">
                                            <text class="h6 price_product">${{ $item->product->price }}</text><br />
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                        <div class="float-md-end">
                                            <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i
                                                    class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
                                            <a href="{{ url('remove_from_cart', [$item->id]) }}"
                                                data-id="{{ $item->id }}"
                                                class="remove-btn btn btn-light border text-danger icon-hover-danger">
                                                Remove</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="border-top pt-4 mx-4 mb-4">
                            <p><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within 1-2 weeks</p>
                            <p class="text-muted">
                                All orders are delivered as soon as possible.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- cart -->
                <!-- summary -->
                <div class="col-lg-3">
                    <div class="card mb-3 border shadow-0">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label class="form-label">Have coupon?</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control border" name=""
                                            placeholder="Coupon code" />
                                        <button class="btn btn-light border">Apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow-0 border">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total price:</p>
                                <p class="mb-2 capital-sum"></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Discount:</p>
                                <p class="mb-2 text-success discount">$0.00</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">TAX:</p>
                                <p class="mb-2 tax">$0.00</p>
                            </div>
                            <hr />
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total price:</p>
                                <p class="mb-2 fw-bold" id="total-price"></p>
                            </div>

                            <div class="mt-3">
                                <form id="order-form" action="{{ url('order') }}" method="POST">
                                    @csrf
                                    <input type="hidden" id="total-price-input" name="total_price" value="">
                                    <button type="submit" class="btn btn-success w-100 shadow-0 mb-2"> Make Purchase
                                    </button>
                                </form>
                                <a href="{{ route('dashboard') }}" class="btn btn-light w-100 border mt-2"> Back to shop
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- summary -->
            </div>
        </div>
    </section>


    @include('home.footer')

    <!-- end info section -->
    @include('home.js')

    <script>
        $(document).ready(function() {
            let total = 0;
            $('.price_product').each(function() {
                let price = $(this).text();
                // Loại bỏ ký tự đô la và chuyển đổi thành số
                price = Number(price.replace('$', ''));
                total += price;
            });
            // Cập nhật tổng giá trị vào phần tử có id 'total-price'
            $('#total-price').text("$" + total.toFixed(2));
            $('#total-price-input').val("$" + total.toFixed(2));

        });
    </script>

</body>

</html>
