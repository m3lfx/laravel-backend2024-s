@extends('layouts.shop')

@section('body')
    <h1>Your Shopping Cart</h1>
    <div id="cart-container">
        <div id="cart">
            <i class="fa fa-shopping-cart fa-2x openCloseCart" aria-hidden="true"></i>
            <button id="emptyCart">Empty Cart</button>
        </div>
        <span id="itemCount"></span>
    </div>
    <div id="shoppingCart">
        <div id="cartItemsContainer">
            <h2>Items in your cart</h2>
            
            <i class="fas fa-times-circle"></i>
            
            <div id="cartItems">

            </div>
            <button class="btn btn-primary" id="checkout">Checkout</button>;
            <button class="btn btn-primary" id="close">Close</button>;
            <span id="cartTotal"></span>
        </div>
    </div>

    <nav>
        <ul>
            <li><a href="index.html">Shopping Cart</a></li>
        </ul>
    </nav>
    <div class="container container-fluid" id="items">

    </div>
@endsection


