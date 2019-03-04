<?php

namespace App\DataFixtures;

use App\Entity\Order;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $product1 = new Product();
        $product1->setName('Lego Box Small');
        $product1->setPrice(29);
        $product1->setSku('SKU-001');
        $manager->persist($product1);

        $product2 = new Product();
        $product2->setName('Lego Box Medium');
        $product2->setPrice(59);
        $product2->setSku('SKU-002');
        $manager->persist($product2);

        $product3 = new Product();
        $product3->setName('Lego Box Large');
        $product3->setPrice(99);
        $product3->setSku('SKU-003');
        $manager->persist($product3);

        $order1 = new Order();
        $order1->addProduct($product1);
        $order1->addProduct($product2);
        $order1->setSubtotal(
            $product1->getPrice() + $product2->getPrice());
        $manager->persist($order1);

        $order2 = new Order();
        $order2->addProduct($product2);
        $order2->addProduct($product3);
        $order2->setSubtotal(
            $product2->getPrice() + $product3->getPrice());
        $manager->persist($order2);

        $order3 = new Order();
        $order3->addProduct($product3);
        $order3->setSubtotal($product3->getPrice());
        $manager->persist($order3);

        $manager->flush();
    }
}
