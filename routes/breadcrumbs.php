<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Products
Breadcrumbs::for('products', function ($trail) {
    $trail->parent('home');
    $trail->push('Products', route('product.index'));
});

// Home > Products > [Product]
Breadcrumbs::for('product', function ($trail, $product) {
    $trail->parent('products');
    $trail->push($product->name);
});

// Home > Search
Breadcrumbs::for('search', function ($trail) {
    $trail->parent('home');
    $trail->push('Search');
});

// Home > About
Breadcrumbs::for('about', function ($trail) {
    $trail->parent('home');
    $trail->push('About');
});

// Home > Contact
Breadcrumbs::for('contact', function ($trail) {
    $trail->parent('home');
    $trail->push('Contact');
});

// Home > Cart
Breadcrumbs::for('cart', function ($trail) {
    $trail->parent('home');
    $trail->push('Cart');
});

// Home > Checkout
Breadcrumbs::for('checkout', function ($trail) {
    $trail->parent('home');
    $trail->push('Checkout');
});
