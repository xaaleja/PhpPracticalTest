<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/api/v1/products')) {
            // api_1_new_product
            if (0 === strpos($pathinfo, '/api/v1/products/new') && preg_match('#^/api/v1/products/new(?:\\.(?P<_format>json|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_1_new_product;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_1_new_product')), array (  '_controller' => 'PhpPracticalTest\\ApiBundle\\Controller\\ProductsController::newProductAction',  '_format' => NULL,));
            }
            not_api_1_new_product:

            // api_1_get_product
            if (preg_match('#^/api/v1/products/(?P<id>[^/\\.]++)(?:\\.(?P<_format>json|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_1_get_product;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_1_get_product')), array (  '_controller' => 'PhpPracticalTest\\ApiBundle\\Controller\\ProductsController::getProductAction',  '_format' => NULL,));
            }
            not_api_1_get_product:

            // api_1_get_products
            if (preg_match('#^/api/v1/products(?:\\.(?P<_format>json|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_1_get_products;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_1_get_products')), array (  '_controller' => 'PhpPracticalTest\\ApiBundle\\Controller\\ProductsController::getProductsAction',  '_format' => NULL,));
            }
            not_api_1_get_products:

            // api_1_post_product
            if (preg_match('#^/api/v1/products(?:\\.(?P<_format>json|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_api_1_post_product;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_1_post_product')), array (  '_controller' => 'PhpPracticalTest\\ApiBundle\\Controller\\ProductsController::postProductAction',  '_format' => NULL,));
            }
            not_api_1_post_product:

            // api_1_put_product
            if (preg_match('#^/api/v1/products/(?P<id>[^/\\.]++)(?:\\.(?P<_format>json|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_api_1_put_product;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_1_put_product')), array (  '_controller' => 'PhpPracticalTest\\ApiBundle\\Controller\\ProductsController::putProductAction',  '_format' => NULL,));
            }
            not_api_1_put_product:

        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_homepage;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'PhpPracticalTest\\WebBundle\\Controller\\DefaultController::homepageAction',  '_route' => 'homepage',);
        }
        not_homepage:

        // delete_product
        if (0 === strpos($pathinfo, '/delete_product') && preg_match('#^/delete_product/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_product')), array (  '_controller' => 'PhpPracticalTest\\WebBundle\\Controller\\DefaultController::deleteProductAction',));
        }

        // update_product
        if (0 === strpos($pathinfo, '/update_product') && preg_match('#^/update_product/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_update_product;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_product')), array (  '_controller' => 'PhpPracticalTest\\WebBundle\\Controller\\DefaultController::updateProductAction',));
        }
        not_update_product:

        // nelmio_api_doc_index
        if (rtrim($pathinfo, '/') === '/api/doc') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_nelmio_api_doc_index;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'nelmio_api_doc_index');
            }

            return array (  '_controller' => 'Nelmio\\ApiDocBundle\\Controller\\ApiDocController::indexAction',  '_route' => 'nelmio_api_doc_index',);
        }
        not_nelmio_api_doc_index:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
