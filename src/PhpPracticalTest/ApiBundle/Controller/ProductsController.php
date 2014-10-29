<?php

namespace PhpPracticalTest\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\View\View;
use Symfony\Component\Form\FormTypeInterface;
use PhpPracticalTest\ApiBundle\Form\ProductsType;
use PhpPracticalTest\ApiBundle\Model\ProductsInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ProductsController extends FOSRestController
{
    /**
     * Get single Product,
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Gets a Product for a given id",
     *   output = "PhpPracticalTest\ApiBundle\Entity\Products",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the product is not found"
     *   }
     * )
     *
     * @Annotations\View(templateVar="product")
     *
     * @param Request $request the request object
     * @param int     $id      the product id
     *
     * @return array
     *
     * @throws NotFoundHttpException when product not exist
     */
    public function getProductAction($id)
    {
        $product = $this->getOr404($id);
        return $product;
    }


    /**
     * List all products.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Annotations\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing products.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="5", description="How many products to return.")
     *
     * @Annotations\View(
     *  templateVar="products"
     * )
     *
     * @param Request               $request      the request object
     * @param ParamFetcherInterface $paramFetcher param fetcher service
     *
     * @return array
     */
    public function getProductsAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $offset = $paramFetcher->get('offset');
        $offset = null == $offset ? 0 : $offset;
        $limit = $paramFetcher->get('limit');

        return $this->container->get('php_practical_test.products.handler')->all($limit, $offset);
    }

    /**
     * Create a Product from the submitted data.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Creates a new product from the submitted data.",
     *   input = "PhpPracticalTest\ApiBundle\Form\ProductsType",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "PhpPracticalTestApiBundle:Products:newProduct.html.twig",
     *  statusCode = Codes::HTTP_BAD_REQUEST,
     *  templateVar = "form"
     * )
     *
     * @param Request $request the request object
     *
     * @return FormTypeInterface|View
     */
    public function postProductAction(Request $request)
    {
       try {
           // Hey Products handler create a new Product.
           $newProduct = $this->container->get('php_practical_test.products.handler')->post(
               $request->request->all()
           );

           $routeOptions = array(
               'id' => $newProduct->getId(),
               '_format' => $request->get('_format')
           );

           return $this->routeRedirectView('api_1_get_product', $routeOptions, Codes::HTTP_CREATED);
       } catch (InvalidFormException $exception) {

           return $exception->getForm();
       }
    }

    /**
     * Update existing product from the submitted data or create a new product at a specific location.
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "PhpPracticalTest\ApiBundle\Form\ProductsType",
     *   statusCodes = {
     *     201 = "Returned when the Product is created",
     *     204 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @Annotations\View(
     *  template = "PhpPracticalTestApiBundle:Product:editProduct.html.twig",
     *  templateVar = "form"
     * )
     *
     * @param Request $request the request object
     * @param int     $id      the product id
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException when product not exist
     */
    public function putProductAction(Request $request, $id)
    {
        try {
            if (!($product = $this->container->get('php_practical_test.products.handler')->get($id))) {
                $statusCode = Codes::HTTP_CREATED;
                $product = $this->container->get('php_practical_test.products.handler')->post(
                    $request->request->all()
                );
            } else {
                $statusCode = Codes::HTTP_NO_CONTENT;
                $product = $this->container->get('php_practical_test.products.handler')->put(
                    $product,
                    $request->request->all()
                );
            }

            $routeOptions = array(
                'id' => $product->getId(),
                '_format' => $request->get('_format')
            );

            return $this->routeRedirectView('api_1_get_product', $routeOptions, $statusCode);

        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }
    }

    /**
     * Presents the form to use to create a new product.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @return FormTypeInterface
     */
    public function newProductAction()
    {
        return $this->createForm(new ProductsType());
    }

    /**
     * Fetch the Product or throw a 404 exception.
     *
     * @param mixed $id
     *
     * @return ProductsInterface
     *
     * @throws NotFoundHttpException
     */
    protected function getOr404($id)
    {
        if (!($product = $this->container->get('php_practical_test.products.handler')->get($id))) {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.',$id));
        }

        return $product;
    }
}