<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <style>
        .label-deg {
            font-size: medium;
            font-weight: 500;
        }
    </style>
</head>

<body>
    @include('home.header')

    <div class="pd-wrap">
        <div class="container">
            <div class="heading-section">
                <h2>Order</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('create_order') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="input-1" class="label-deg">Name:</label>
                                    <input type="text" name="nameCustomer" class="form-control" id="input-1"
                                        placeholder="Enter Your Name">
                                </div>
                                <div class="form-group">
                                    <label for="input-2" class="label-deg">Shipping Address:</label>
                                    <input type="text" name="shipAddress" class="form-control" id="input-2"
                                        placeholder="Enter Your Address">
                                </div>
                                <div class="form-group">
                                    <label for="input-3" class="label-deg">Products Price:</label>
                                    <input value="{{ $total }}" type="text" class="form-control"
                                        id="input-3" disabled>
                                </div>

                                <div class="form-group">
                                    <label class="label-deg">Payment Method:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Payment on Delivery"
                                            name="payment" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Payment on Delivery
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Payment by Card"
                                            name="payment" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Payment by Card
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="label-deg">Shipping Method:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="shipType"
                                            id="flexRadioDefault1" value="Standard delivery">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Standard delivery
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="shipType"
                                            id="flexRadioDefault2" value="Fast delivery">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Fast delivery
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="shipType"
                                            id="flexRadioDefault2" value="Economical delivery">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Economical delivery
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="input-5" class="label-deg">Shipping Cost:</label>
                                    <input type="text" class="form-control" id="input-5" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="input-5" class="label-deg">Total Amount:</label>
                                    <input type="text" class="form-control" id="input-6" disabled>
                                    <input type="hidden" class="form-control" id="input-7" name="totalAmount">
                                </div>

                                <hr>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-primary px-5">Order</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>




    @include('home.footer')

    @include('home.js')

    <script>
        $(document).ready(function() {
            $("input[type='radio'][name='shipType']").change(function() {
                var shippingCost;
                switch ($(this).next('label').text().trim()) {
                    case 'Standard delivery':
                        shippingCost = '100'; // Giá ship cho phương thức Standard delivery
                        break;
                    case 'Fast delivery':
                        shippingCost = '200'; // Giá ship cho phương thức Fast delivery
                        break;
                    case 'Economical delivery':
                        shippingCost = '50'; // Giá ship cho phương thức Economical delivery
                        break;
                    default:
                        shippingCost = '0';
                }
                $('#input-5').val('$' + shippingCost);
                var price = $('#input-3').val();
                var totalAmount = parseInt(price.replace('$', '')) + parseInt(shippingCost);
                $('#input-6').val('$' + totalAmount);
                $('#input-7').val(totalAmount);
            });
        });
    </script>

</body>

</html>
