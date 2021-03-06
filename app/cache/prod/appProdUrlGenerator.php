<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes = array(
        'api_1_new_product' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'PhpPracticalTest\\ApiBundle\\Controller\\ProductsController::newProductAction',    '_format' => NULL,  ),  2 =>   array (    '_method' => 'GET',    '_format' => 'json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'json|html',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/api/v1/products/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_1_get_product' => array (  0 =>   array (    0 => 'id',    1 => '_format',  ),  1 =>   array (    '_controller' => 'PhpPracticalTest\\ApiBundle\\Controller\\ProductsController::getProductAction',    '_format' => NULL,  ),  2 =>   array (    '_method' => 'GET',    '_format' => 'json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'json|html',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/\\.]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/api/v1/products',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_1_get_products' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'PhpPracticalTest\\ApiBundle\\Controller\\ProductsController::getProductsAction',    '_format' => NULL,  ),  2 =>   array (    '_method' => 'GET',    '_format' => 'json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'json|html',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/api/v1/products',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_1_post_product' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'PhpPracticalTest\\ApiBundle\\Controller\\ProductsController::postProductAction',    '_format' => NULL,  ),  2 =>   array (    '_method' => 'POST',    '_format' => 'json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'json|html',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/api/v1/products',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_1_put_product' => array (  0 =>   array (    0 => 'id',    1 => '_format',  ),  1 =>   array (    '_controller' => 'PhpPracticalTest\\ApiBundle\\Controller\\ProductsController::putProductAction',    '_format' => NULL,  ),  2 =>   array (    '_method' => 'PUT',    '_format' => 'json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'json|html',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/\\.]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/api/v1/products',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'PhpPracticalTest\\WebBundle\\Controller\\DefaultController::homepageAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'delete_product' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'PhpPracticalTest\\WebBundle\\Controller\\DefaultController::deleteProductAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/delete_product',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'update_product' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'PhpPracticalTest\\WebBundle\\Controller\\DefaultController::updateProductAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/update_product',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'nelmio_api_doc_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Nelmio\\ApiDocBundle\\Controller\\ApiDocController::indexAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/doc/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
