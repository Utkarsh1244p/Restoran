@extends('layouts.app')

@section('content');

        <div class="container-xxl py-5 bg-dark hero-header mb-5" style="margin-top: -50px">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Pay With PayPal</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">PayPal</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">  
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script src="https://www.paypal.com/sdk/js?client-id=AdUB4Z-y-2iz44fO0oaFadfeBxa5nkzEWGj5fV_pvrAJnRVGrKGKBm0J4HdUKk6lKl0oSo_M28_GN2BM&currency=USD"></script>
                    <!-- Set up a container element for the button -->
                    <div style="width:50%; margin:0 auto;" id="paypal-button-container"></div>
                    <script>
                        paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked
                        createOrder: (data, actions) => {
                            return actions.order.create({
                            purchase_units: [{
                                amount: {
                                value: '{{Session::get('price')}}' // Can also reference a variable or function
                                }
                            }]
                            });
                        },
                        // Finalize the transaction after payer approval
                        onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {

                             window.location.href="{{route('pay.success')}}";
                            });
                        }
                        }).render('#paypal-button-container');
                    </script>
                  
                </div>
            </div>
        </div>






@endsection