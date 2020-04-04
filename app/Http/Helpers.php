<?php

function stockLevel($quantity) {
    if ($quantity > setting('site.stock_threshold')) {
        return '<span class="badge badge-pill badge-success">In Stock</span>';
    } elseif ($quantity > 0) {
        return '<span class="badge badge-pill badge-warning">Low Stock</span>';
    } else {
        return '<span class="badge badge-pill badge-danger">Out of Stock</span>';
    }
}
