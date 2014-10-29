<?php
namespace PhpPracticalTest\ApiBundle\Handler;

use Symfony\Component\Form\FormFactoryInterface;
use PhpPracticalTest\ApiBundle\Model\ProductsInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PhpPracticalTest\ApiBundle\Form\ProductsType;


class ProductsHandler implements ProductsHandlerInterface
{
    private $om;
    private $entityClass;
    private $repository;
    private $formFactory;

    public function __construct(ObjectManager $om, $entityClass, FormFactoryInterface $formFactory)
    {
        $this->om = $om;
        $this->entityClass = $entityClass;
        $this->repository = $this->om->getRepository($this->entityClass);
        $this->formFactory = $formFactory;
    }

    public function get($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Create a new Product.
     *
     * @param array $parameters
     *
     * @return ProductsInterface
     */
    public function post(array $parameters)
    {
        $product = $this->createProduct(); // factory method create an empty Product

        // Process form does all the magic, validate and hydrate the Product Object.
        return $this->processForm($product, $parameters, 'POST');
    }
    /**
     * Edit a Product, or create if not exist.
     *
     * @param ProductsInterface $product
     * @param array         $parameters
     *
     * @return ProductsInterface
     */
    public function put(ProductsInterface $product, array $parameters)
    {
        return $this->processForm($product, $parameters, 'PUT');
    }

    /**
     * Partially update a Product.
     *
     * @param ProductsInterface $product
     * @param array         $parameters
     *
     * @return ProductsInterface
     */
    /*public function patch(ProductsInterface $product, array $parameters)
    {
        return $this->processForm($product, $parameters, 'PATCH');
    }*/

    /**
     * Get a list of Products.
     *
     * @param int $limit  the limit of the result
     * @param int $offset starting from the offset
     *
     * @return array
     */
    public function all($limit = 5, $offset = 0, $orderby = null)
    {
        return $this->repository->findBy(array(), $orderby, $limit, $offset);
    }

    /**
     * Processes the form.
     *
     * @param ProductsInterface $product
     * @param array         $parameters
     * @param String        $method
     *
     * @return ProductsInterface
     *
     * @throws \PhpPracticalTest\ApiBundle\Exception\InvalidFormException
     */
    private function processForm(ProductsInterface $product, array $parameters, $method = "PUT")
    {
        $form = $this->formFactory->create(new ProductsType(), $product, array('method' => $method));
        $form->submit($parameters, 'PATCH' !== $method);
        if ($form->isValid()) {

            $product = $form->getData();
            $this->om->persist($product);
            $this->om->flush($product);

            return $product;
        }

        throw new InvalidFormException('Invalid submitted data', $form);
    }
}