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
                    <form action="" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete Product</button>
                    </form>
                    @endif

                    @if (Auth()->user()->role_id === Helper::getCustomerRoleId()) {{--Untuk customer--}}
                    {{-- for Customer --}}
                    <form action="/cart/add/{{$product->id}}" method="post">
                        @csrf
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" min="1" max="5" class="me-4">
                        <button type="submit" class="btn btn-danger">Add to cart</button>
                    </form>
                    <form action="/wishlist/add/{{$product->id}}" method="post" class="ms-2">
                        @csrf
                        <button type="submit" class="btn btn-danger">Add to wishlist</button>
                    </form>
                    @endif
                    
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection
