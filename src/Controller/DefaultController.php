<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 04.03.19
 * Time: 11:29
 */

namespace App\Controller;


use App\Entity\Order;
use App\Service\PayPalService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
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


    public function payment(PayPalService $payPalService)
    {
        $order = $_REQUEST;
        $approvalLink = $payPalService->createPaymentFromOrder($order);

        return new RedirectResponse($approvalLink);
    }

    public function success()
    {
        return new Response("success");
    }

    public function failure()
    {
        return new Response("failure");
    }
}