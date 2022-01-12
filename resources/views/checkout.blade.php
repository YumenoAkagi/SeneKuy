@extends('master')

@section('content')

<div class="container mb-5">

    <h2 class="mb-4">Checkout</h2>

    <div class="row">
        <div class="col col-4">
            <h4 class="mb-3">Item</h4>

            @for ($i = 0; $i < 4; $i++) <div class="card mb-2">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQMAAADCCAMAAAB6zFdcAAAAQlBMVEX///+hoaGenp6ampr39/fHx8fOzs7j4+P8/Pyvr6/d3d3FxcX29va6urqYmJjs7OzU1NSlpaW1tbWtra3n5+e/v78TS0zBAAACkUlEQVR4nO3b63KCMBCGYUwUUVEO6v3fagWVY4LYZMbZnff51xaZ5jON7CZNEgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABQb5tvI8qzX4/nH84XG5Upfj2ir2V2E5fZ/XpIX9saMnhkYLIkiyRJjdgMoiEDMmiQgfwM8rSu77ew2wnPoLTmwdZBs0J2BuXrYckcQm4nOoP+WcmWAbcTnUHZPy9eA24nOoN7n0HI54ToDM5k8PjluwyqgNuJzqDoaugPg8gWZ4noDAYLwuIg75fLeeHHsjNIzrZJwWwW+0DNsmEWPjiEZ5AcD8ZUu8VZ8HyQMifvBdIz+PS33i8adu+7Qn4Gn1Tdupl7rlCfQb9seosK7RkcBy1o30iVZ5CPOtDW3WhQnsF13IV3v0p3BqfJRoSpXVepzmA/24+yqeMyzRm4tqOs44lSUwa3yfgOri25av5CPRnklR33VlPnrqSZV09qMsiqSWV082xOz1uPajJ49pTM/f115k6guWa6JGjJ4N1lt8fXN2rv/vysjFaSQdFXBc/KKF04ptFPliclGVR9Bu27XCyeVOkmy5OODAZN9rYyyip/AIPJ8qIig+PoXbf7YdPdncFoSdCQQT4ZceV+MhiFMBy0hgyu0yGvOLI17KwpyGBaHK5jtt0N5GcwLw7XZdB31sRn8O+ziqYro8Vn4CwOV+k6a9Iz+PwRsKC7h+gMfMXhKu/OmuwM/MXhKq8yWnYG/uJw5Uxoy2jRGZTBZ/jboxuSM1guDtdNhKazJjiDbNMe0AxzKUVnkO+jEJxBxNtJzWCTxlNLzSB8KehJ/H+mJGYAjaDjzj9SnHZRuXZiAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAECXP1XDHv7U4SNFAAAAAElFTkSuQmCC"
                            alt="" class="img-shoppingcart-item img-fluid">
                    </div>
                    <div class="content-body d-flex justify-content-between align-items-end" style="width: 100%">
                        <div>
                            <p class="fw-bold">Item Name</p>
                            <p class="m-0">Rp 20.000 <span>x 3</span></p>
                        </div>
                        <div>
                            {{-- quantity --}}
                            <p class="m-0">Rp 60.000</p>
                        </div>
                    </div>
                </div>
        </div>
        @endfor
    </div>
    <div class="col">
        <h4 class="mb-3">Payment</h4>

        <div class="d-flex flex-column justify-content-between">
            <div>
                <h5 class="mb-3">Payment method</h5>
                <div class="border rounded p-2 mb-5">
                    <p class="text-center m-0">BCA</p>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div>
                    <h6 class="mb-1">Total harga</h6>
                    <h4 class="m-0">Rp 999.999</h4>
                </div>

                <a href="#"><div class="btn btn-dark">Pay</div></a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection