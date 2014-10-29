<?php

namespace PhpPracticalTest\ApiBundle\Handler;

use PhpPracticalTest\ApiBundle\Model\ProductsInterface;

Interface ProductsHandlerInterface
{
    public function get($id);
    public function post(array $parameters);
    public function put(ProductsInterface $product, array $parameters);
    //public function patch(ProductsInterface $product, array $parameters);
    public function all($limit = 5, $offset = 0, $orderby = null);


}