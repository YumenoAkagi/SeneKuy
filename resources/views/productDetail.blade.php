@extends('master')

@section('content')
<div class="d-flex justify-content-center">
    <div class="card w-75">
        @foreach($productDetail as $product)
        <div class="card-body d-flex justify-content-start">
            <div class="product-image-card d-flex justify-content-start" style="margin-left: 10em;">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQMAAADCCAMAAAB6zFdcAAAAQlBMVEX///+hoaGenp6ampr39/fHx8fOzs7j4+P8/Pyvr6/d3d3FxcX29va6urqYmJjs7OzU1NSlpaW1tbWtra3n5+e/v78TS0zBAAACkUlEQVR4nO3b63KCMBCGYUwUUVEO6v3fagWVY4LYZMbZnff51xaZ5jON7CZNEgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABQb5tvI8qzX4/nH84XG5Upfj2ir2V2E5fZ/XpIX9saMnhkYLIkiyRJjdgMoiEDMmiQgfwM8rSu77ew2wnPoLTmwdZBs0J2BuXrYckcQm4nOoP+WcmWAbcTnUHZPy9eA24nOoN7n0HI54ToDM5k8PjluwyqgNuJzqDoaugPg8gWZ4noDAYLwuIg75fLeeHHsjNIzrZJwWwW+0DNsmEWPjiEZ5AcD8ZUu8VZ8HyQMifvBdIz+PS33i8adu+7Qn4Gn1Tdupl7rlCfQb9seosK7RkcBy1o30iVZ5CPOtDW3WhQnsF13IV3v0p3BqfJRoSpXVepzmA/24+yqeMyzRm4tqOs44lSUwa3yfgOri25av5CPRnklR33VlPnrqSZV09qMsiqSWV082xOz1uPajJ49pTM/f115k6guWa6JGjJ4N1lt8fXN2rv/vysjFaSQdFXBc/KKF04ptFPliclGVR9Bu27XCyeVOkmy5OODAZN9rYyyip/AIPJ8qIig+PoXbf7YdPdncFoSdCQQT4ZceV+MhiFMBy0hgyu0yGvOLI17KwpyGBaHK5jtt0N5GcwLw7XZdB31sRn8O+ziqYro8Vn4CwOV+k6a9Iz+PwRsKC7h+gMfMXhKu/OmuwM/MXhKq8yWnYG/uJw5Uxoy2jRGZTBZ/jboxuSM1guDtdNhKazJjiDbNMe0AxzKUVnkO+jEJxBxNtJzWCTxlNLzSB8KehJ/H+mJGYAjaDjzj9SnHZRuXZiAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAECXP1XDHv7U4SNFAAAAAElFTkSuQmCC" alt="" class="img-thumbnail img-fluid">
            </div>
            <div class="product-detail-card" style="margin-left: 5em;">
                <strong style="font-size: 3em;">{{$product->name}}</strong>
                <br>
                Rp. {{$product->price}}
                
                <div class="button" style="margin-top: 3em;">
                    {{-- for Customer --}}
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="5" class="me-4">
                    <form action="/cart/add/{{$product->id}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Add to cart</button>
                    </form>
                    <form action="/wishlist/add/{{$product->id}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Add to wishlist</button>
                    </form>

                    {{-- for Admin --}}
                    {{-- <span class="deleteProduct" style="border-radius: 5px; background-color: pink; padding: 1em; margin: 1em;">
                        <a href="#" style="text-decoration: none; color: black;">Delete Product</a>
                    </span> --}}

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
