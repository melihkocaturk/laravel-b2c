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
