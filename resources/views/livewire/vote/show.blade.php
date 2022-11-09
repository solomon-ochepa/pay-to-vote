<div class="col-md-8 col-lg-9 vstack gap-4">
    <div class="card">
        <div class="card-header">
            <h4>Voting: {{ $vote->contestant->user->first_name }} {{ $vote->contestant->user->last_name }}</h4>
        </div>

        <div class="card-body">
            <p>Votes: {{ $vote->total }}</p>
            <p>Amount: {{ $vote->amount }}</p>
        </div>

        <div class="card-footer">
            {{-- @if ($payment_method == payment_method('paystack')) --}}
            <button type="button" class="btn btn-sm btn-primary" aria-label="Pay now" onclick="pay()">
                {{ __('Pay') }}
            </button>
            @if ($vote->status_code = 1)
                @push('js')
                    <script>
                        // document.addEventListener('livewire:load', function() {
                        return pay();
                        // })
                    </script>
                @endpush
            @endif
            {{-- @endif --}}
        </div>
    </div>
</div>

@push('js')
    <!-- Paystack -->
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        // document.addEventListener('livewire:load', function() {
        var paystackIframeOpened = false;
        var data = @js($data);
        var api = @js($api);

        var handler = PaystackPop.setup({
            key: api.key,
            ref: data.ref,
            amount: data.amount * 100,
            email: data.email, // customer email
            label: data.label, // payment description
            phone: data.phone,
            metadata: {
                invoiceid: data.ref,
                customername: data.voter.name,
                custom_fields: [{
                    display_name: "Votes",
                    variable_name: "votes",
                    value: data.total
                }, {
                    display_name: "Amount",
                    variable_name: "amount",
                    value: data.amount
                }, {
                    display_name: "Event name",
                    variable_name: "event_name",
                    value: data.contestant.event.name,
                }]
            },

            callback: function(response) {
                Livewire.emit('processing')
                // window.location.href = payment.url;
            },

            onClose: function() {
                paystackIframeOpened = false;
            }
        });

        function pay() {
            if (handler.fallback || paystackIframeOpened) {
                // Handle non-support of iframes or Being able to click pay even though iframe already open
                // window.location.href =
                //     'https://www.whogohost.com/host/modules/gateways/callback/paystack.php?invoiceid=1227970&email=solomonochepa%40gmail.com&phone=8162672618&amountinkobo=600000&customername=Solomon+Ochepa&go=standard';

            } else {
                handler.openIframe();
                paystackIframeOpened = true;
                //     // $('img[alt="Loading"]').hide();
                //     // $('div.alert.alert-info.text-center').html('Click the button below to retry payment...');
                //     // $('.payment-btn-container2').append(
                //     //     '<button type="button" onclick="pay()">Pay Now</button>');
            }
        }

        // Set the value of the "count" property
        // @/this.count = 5

        // Call the increment component action
        // @/this.increment()

        // Run a callback when an event ("foo") is emitted from this component
        // @/this.on('foo', () => {})
        // })
    </script>
@endpush
