<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function customer($id = null, $name = null, $address = null)
    {
        if (is_null($id) || is_null($name) || is_null($address)) {
            print('required 3 parameters of id, name, address');
            return view('customer');
        }
        return view('customer', compact('id', 'name', 'address'));
    }

    public function item($itemNo = null, $name = null, $price = null)
    {
        if (is_null($itemNo) || is_null($name) || is_null($price)) {
            print('required 3 parameters of itemNo, name, price');
            return view('item');
        }
        return view('item', compact('itemNo', 'name', 'price'));
    }

    public function order($customerId = null, $name = null, $orderNo = null, $date = null)
    {
        if (is_null($customerId) || is_null($name) || is_null($orderNo) || is_null($date)) {
            print('required 3 parameters of customerId, name, orderNo, date');
            return view('order');
        }
        return view('order', compact('customerId', 'name', 'orderNo', 'date'));
    }

    public function details($transNo = null, $orderNo = null, $itemId = null, $name = null, $price = null, $qty = null)
    {
        if (is_null($transNo) || is_null($orderNo) || is_null($itemId) || is_null($name) || is_null($price) || is_null($qty)) {
            print('required 3 parameters of transNo, orderNo, itemId, name, price, qty');
            return view('details');
        }
        return view('details', compact('transNo', 'orderNo', 'itemId', 'name', 'price', 'qty'));
    }
}
