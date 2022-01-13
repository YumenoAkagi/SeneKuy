@extends('master')

@section('content')
<div class="d-flex justify-content-center">
    <div class="container">
        @foreach($productDetail as $product)
        <div class="container border p-4 d-flex align-items-center row">
                <img src="{{asset($product->imgPath)}}" alt="" class="img-fluid col-4 p-3">
            <div class="col-8">
                <strong style="font-size: 3em;">{{$product->name}}</strong>
                <br>
                Rp. {{$product->price}}
                
                <div class="button mt-5 d-flex">
                    

                    @if (Auth()->user()->role_id === Helper::getAdminRoleId()) {{--Untuk admin--}}
                    {{-- for Admin --}}
                    <form action="/product/delete/{{ $product->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this product?')">Delete Product</button>
                    </form>
                    @endif

                    {{-- for Customer --}}
                    @if (Auth()->user()->role_id === Helper::getCustomerRoleId())
                        <form action="/cart/add/{{$product->id}}" method="post">
                            @csrf
                            <label for="quantity">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" min="1" max="5" class="me-4">
                            <button type="submit" class="btn btn-danger">Add to cart</button>
                        </form>

                        @if (Helper::isAddedToWishlist($product->id))
                        <form action="/wishlist/deleteByProduct/{{$product->id}}" method="post" class="ms-2">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Remove from wishlist</button>
                        </form>
                        @else
                        <form action="/wishlist/add/{{$product->id}}" method="post" class="ms-2">
                            @csrf
                            <button type="submit" class="btn btn-danger">Add to wishlist</button>
                        </form>
                        @endif
                    @endif
                    


                        {{-- for Admin --}}
                        {{-- <span class="deleteProduct"
                            style="border-radius: 5px; background-color: pink; padding: 1em; margin: 1em;">
                            <a href="#" style="text-decoration: none; color: black;">Delete Product</a>
                        </span> --}}

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection
