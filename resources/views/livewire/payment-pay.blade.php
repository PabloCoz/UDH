<div>

{{-- 
        @php
            require base_path('vendor/autoload.php');
            // Agrega credenciales
            MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
    
    
            // Crea un objeto de preferencia
            $preference = new MercadoPago\Preference();
    
            // Crea un ítem en la preferencia
            $item = new MercadoPago\Item();
            $item->title = $course->title;
            $item->quantity = 1;
            $item->unit_price = $course->price->value;
            $preference->items = array($item);
            $preference->save();
    
            $preference->back_urls = array(
                "success" => "https://www.tu-sitio/success",
                "failure" => "http://www.tu-sitio/failure",
                "pending" => "http://www.tu-sitio/pending"
            );
    
            $preference->auto_return = "approved";
        @endphp --}}
    
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
            <h1 class="text-gray-500 text-3xl font-bold">Detalle del pedido</h1>
    
            <div class="card">
                <div class="card-body text-gray-600">
                    <article class="flex items-center">
                        <img class="h-12 w-12 object-cover" src="{{Storage::url($course->image->url)}}">
                        <h1 class="text-lg ml-2">{{$course->title}}</h1>
                        <p class="text-xl font-bold ml-auto">US$ {{$course->price->value}}</p>
                    </article>
    
                    <div class="flex justify-end mt-2 mb-4">
                        <div class="cho-container">
    
                        </div>
                        <div id="paypal-button-container"></div>
                    </div>
                    <hr>
                    <p class="text-sm mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis error molestias minus? Magnam harum explicabo dolorum aut nihil aliquam, 
                        vitae necessitatibus maiores maxime esse voluptates impedit praesentium, nostrum nisi ipsum.
                        <a class="text-red-500 font-bold">Terminos y condiciones</a>
                    </p>
                </div>
            </div>
        </div>
    
        {{-- // SDK MercadoPago.js V2 --}}
        <script src="https://sdk.mercadopago.com/js/v2"></script>
        {{-- <script src="https://www.paypal.com/sdk/js?&client-id={{ config('services.paypal.client_id') }}"></script> --}}
        <script src="https://www.paypal.com/sdk/js?client-id=test"></script>
        {{-- <script>paypal.Buttons().render('#paypal-button-container');</script> --}}
        <script>
            paypal.Buttons({
              createOrder: function(data, actions) {
                // This function sets up the details of the transaction, including the amount and line item details.
                return actions.order.create({
                  purchase_units: [{
                    amount: {
                      value: '{{$course->price->value}}'
                    }
                  }]
                });
              },
              onApprove: function(data, actions) {
                // This function captures the funds from the transaction.
                return actions.order.capture().then(function(details) {
                  // This function shows a transaction success message to your buyer.
                  Livewire.emit('payCompleted');
                });
              }
            }).render('#paypal-button-container');
            //This function displays Smart Payment Buttons on your web page.
          </script>
{{--         <script>
            // Agrega credenciales de SDK
              const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
                    locale: 'es-AR'
              });
            
              // Inicializa el checkout
              mp.checkout({
                  preference: {
                      id: '{{ $preference->id }}'
                  },
                  render: {
                        container: '.cho-container', // Indica dónde se mostrará el botón de pago
                        label: 'Finalizar Compra', // Cambia el texto del botón de pago (opcional)
                  }
            });
        </script> --}}

</div>
