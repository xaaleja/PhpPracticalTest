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

        $em = $this->getDoctrine()->getManager();
        $products =$em->getRepository('PhpPracticalTestApiBundle:Products')->findAll();

        return $this->render('PhpPracticalTestWebBundle:Default:showProducts.html.twig', array('products' => $products,
            'form' => $form->createView()));
    }

    public function deleteProductAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product =$em->getRepository('PhpPracticalTestApiBundle:Products')->find($id);
        $em->remove($product);
        $em->flush();
        return $this->redirect($this->generateUrl('homepage'));
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

            }
        }
        $em = $this->getDoctrine()->getManager();
        $product =$em->getRepository('PhpPracticalTestApiBundle:Products')->find($id);

        return $this->render('PhpPracticalTestWebBundle:Default:editProducts.html.twig', array('product' => $product,
            'form' => $form->createView()));
    }

    public function addProductAction()
    {
        //if(!$this->getRequest()->isXmlHttpRequest())
          //  throw $this->createNotFoundException('No existe la página a la que desea acceder');

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

                $return=array("responseCode"=>200);
                $return=json_encode($return);//jscon encode the array
                return new Response($return,200,array('Content-Type'=>'application/json'));
            }
        }

    }

}
