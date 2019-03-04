<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 04.03.19
 * Time: 11:29
 */

namespace App\Controller;


use App\Entity\Order;

class DefaultController
{
    public function index()
    {
        $randomOrder = rand(1,3);
        $repository = $this->getDoctrine()->getRepository(Order::class);
        $order = $repository->find($randomOrder);
        $products = $order->getProducts();

        return $this->render('base.html.twig', [
            'order' => $order,
            'products' => $products,
        ]);
    }

}