<?php

namespace PhpPracticalTest\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use PhpPracticalTest\ApiBundle\Entity\Products;
use PhpPracticalTest\ApiBundle\Form\ProductsType;
use Symfony\Component\Serializer\Serializer;

class DefaultController extends Controller
{
    public function homepageAction()
    {
        $product = new Products();
        $form = $this->createForm(new ProductsType(), $product);
        /*
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $product->setUpdatedAt(new \DateTime('now'));
                $em = $this->getDoctrine()->getManager();
                $em->persist($product);
                $em->flush();
            }
        }*/
        $formDelete = $this->createFormBuilder($product)
            ->add('delete', 'submit')
            ->getForm();

        $em = $this->getDoctrine()->getManager();
        $products =$em->getRepository('PhpPracticalTestApiBundle:Products')->findAll();

        return $this->render('PhpPracticalTestWebBundle:Default:showProducts.html.twig', array('products' => $products,
            'form' => $form->createView(), 'formDelete' => $formDelete->createView()));
    }

    /*public function deleteProductAction($id)
    {
        if(!$this->getRequest()->isXmlHttpRequest())
            throw $this->createNotFoundException('No existe la página a la que desea acceder');
        $em = $this->getDoctrine()->getManager();
        $product =$em->getRepository('PhpPracticalTestApiBundle:Products')->find($id);
        $em->remove($product);
        $em->flush();
        //return $this->redirect($this->generateUrl('homepage'));
        $return = (json_encode(array('responseCode' => 200)));
        return new Response($return,200,array('Content-Type'=>'application/json'));
    }*/

    public function deleteProductAction($id)
    {
        if(!$this->getRequest()->isXmlHttpRequest())
            throw $this->createNotFoundException('No existe la página a la que desea acceder');
        $product = new Products();
        $form = $this->createFormBuilder($product)
                    ->add('delete', 'submit')
                    ->getForm();
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $product =$em->getRepository('PhpPracticalTestApiBundle:Products')->find($id);
                $em->remove($product);
                $em->flush();
                $return = (json_encode(array('responseCode' => 200)));
                return new Response($return,200,array('Content-Type'=>'application/json'));
            }
        }
    }

    public function addProductAction()
    {
        if(!$this->getRequest()->isXmlHttpRequest())
            throw $this->createNotFoundException('No existe la página a la que desea acceder');

        $product = new Products();
        $form = $this->createForm(new ProductsType(), $product);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $product->setUpdatedAt(new \DateTime('now'));
                $em = $this->getDoctrine()->getManager();
                $em->persist($product);
                $em->flush();
                $return = (json_encode(array('responseCode' => 200, 'productId' => $product->getId(), 'productName' => $product->getProductName(),
                'productPrice' => $product->getProductPrice(), 'productCategoryId' => $product->getCategoryId(), 'productUpdatedAt' => $product->getUpdatedAt()->format('Y-m-d'))));

                return new Response($return,200,array('Content-Type'=>'application/json'));
            }
        }

    }

    public function updateProductAction($id)
    {
        $p = new Products();
        $form = $this->createForm(new ProductsType(), $p);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $product =$em->getRepository('PhpPracticalTestApiBundle:Products')->find($id);
                $product->setUpdatedAt(new \DateTime('now'));
                $product->setProductName($p->getProductName());
                $product->setProductPrice($p->getProductPrice());
                $product->setCategoryId($p->getCategoryId());

                $em->flush();
                $return = (json_encode(array('responseCode' => 200, 'productId' => $product->getId(), 'productName' => $product->getProductName(),
                'productPrice' => $product->getProductPrice(), 'productCategoryId' => $product->getCategoryId(), 'productUpdatedAt' => $product->getUpdatedAt()->format('Y-m-d'))));

                return new Response($return,200,array('Content-Type'=>'application/json'));

            }
        }
        $em = $this->getDoctrine()->getManager();
        $product =$em->getRepository('PhpPracticalTestApiBundle:Products')->find($id);

        return $this->render('PhpPracticalTestWebBundle:Default:editProducts.html.twig', array('product' => $product,
            'form' => $form->createView()));
    }

}
