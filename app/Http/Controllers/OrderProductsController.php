<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

session_start();

class OrderProductsController extends Controller
{
    /**
     * Adiciona os produtos no pedido
     *
     * @return json
     */
    public function addProductsToOrder($id) {


        $product = Product::find($id);

        
        array_push($_SESSION['order']['products'], $product);

        if (empty($product)) {
            $addProduct['success'] = false;
            $addProduct['message'] = 'Nenhum dado encontrado';
            return  json_encode($addProduct);

        } else {
            $addProduct['success'] = true;
            $addProduct['message'] = 'Sucesso';
            $addProduct['data'] = $product;

            return  json_encode($addProduct);

        }

    }
}
