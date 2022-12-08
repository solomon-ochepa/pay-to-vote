<div class="col-md-8 col-lg-9 vstack gap-4">
    <div class="card">
        <div class="card-header">
            <h4>Voting: {{ $vote->contestant->name }}</h4>
        </div>

        <div class="card-body">
            <p>Votes: {{ $vote->total }}</p>
            <p>Amount: {{ $vote->amount }}</p>
        </div>

        @if (!$vote->active and $vote->status_code == 1)
            <div class="card-footer">
                <button type="button" class="btn btn-sm btn-primary" aria-label="Pay now" onclick="pay()">
                    {{ __('Pay') }}
                </button>
            </div>
        @endif
    </div>
</div>

@push('js')
    <!-- Paystack -->
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        // document.addEventListener('livewire:load', function() {
        var paystackIframeOpened = false;

        var handler = PaystackPop.setup({
            key: @js($api['key']),
            ref: @js($vote->id),
            amount: (@js($vote->amount) * 100),
            email: @js($vote->voter->phone) + "@" + @js(Str::contains(env('APP_DOMAIN'), '.test') ? 'okitechnologies.com' : env('APP_DOMAIN')),
            label: "Vote: #" + @js($vote->contestant->number),
            phone: @js($vote->voter->phone),
            metadata: {
                invoiceid: @js($vote->id),
                customername: @js($vote->voter->name),
                custom_fields: [{
                    display_name: "Event",
                    variable_name: "event_name",
                    value: @js($vote->contestant->event->name),
                }, {
                    display_name: "Contestant",
                    variable_name: "contestant_name",
                    value: @js($vote->contestant->name),
                }, {
                    display_name: "Voter",
                    variable_name: "voter",
                    value: @js($vote->voter->name)
                }, {
                    display_name: "Votes",
                    variable_name: "votes",
                    value: @js($vote->total)
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

    @if ($vote->status_code == 1)
        @push('js')
            <script>
                document.addEventListener('livewire:load', function() {
                    pay();
                })
            </script>
        @endpush
    @endif

@endpush
