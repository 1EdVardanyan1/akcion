<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BrandCategory;
use AppBundle\Entity\Category;
use AppBundle\Entity\Products;
use AppBundle\Entity\TopSelling;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        return $this->render('Pages/index.html.twig');
    }

    /**
     * @Route("/view" , name="view")
     */
    public function quickViewAction(){

        return $this->render(':Pages:quickView.html.twig');
    }

//->where('p.category = :category or :category IS NULL')
    /**
     * @Route("/products/{paginate}", name="products",requirements={"paginate"="\d+"})
     */
    public function listAction($paginate = 1,Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $category=$em->getRepository(Category::class)-> findAll();
        $brand=$em->getRepository(BrandCategory::class)->findAll();

                            /**request filters**/
        $categoryFilter=$request->get('check-category');
        $MinPriceFilter=$request->get('min-price');
        $MaxPriceFilter=$request->get('max-price');
        $BrandFilter=$request->get('check-brand');
//        dump($request);
//        die;


                            /**request filters**/

                            /**TopSelling**/
        $topSell=$em->getRepository(TopSelling::class)-> findAll();
                            /**TopSelling**/

                            /** paginator**/

        $postsPerPage = 6;/** cucadrvox orinaki qanak**/
        $blogRepository = $this->getDoctrine()->getRepository(Products::class);
        $blogsTotalCountQuery = $blogRepository->createQueryBuilder('p')
            ->select('count(p)')
            ->getQuery()
        ;

        $blogsTotalCount = $blogsTotalCountQuery->getSingleScalarResult();
        $paginationTotal = ceil($blogsTotalCount / $postsPerPage); /**knopkeqi,ejeri qanak **/

        if($paginate > $paginationTotal){
            $paginate = $paginationTotal;
        }elseif ($paginate<1){
            $paginate = 1;
        }
        $offset = $paginate - 1;
        if($paginate !== 1){ $offset = $postsPerPage * $paginate - $postsPerPage; }

        $blogsTotalCountQuery = $blogRepository->createQueryBuilder('p')
            ->select('count(p)')
            ->getQuery()
        ;
        $blogsTotalCount = $blogsTotalCountQuery->getSingleScalarResult();

        $paginationTotal = ceil($blogsTotalCount / $postsPerPage); /**knopkeqi,ejeri qanak **/

/******************ppopoxutyunAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA***********************/
        /** paginator**/
            $blogsQuery = $blogRepository->createQueryBuilder('p')
                ->where('p.category = :category or :category IS NULL')
                ->setFirstResult($offset)
                ->setMaxResults($postsPerPage)
                ->getQuery()
            ;
            $product = $blogsQuery->getResult();




        return $this->render('Pages/products.html.twig', array(
            'paginate' => $paginate,
            'paginationTotal' => $paginationTotal,
            'categoryName'=> $category,
            'brand' => $brand,
            'products' =>$product,
            'TopSelling'=>$topSell
        ));
    }

//    /**
//     * @Route("/f" , name="f")
//     */
//    public function topSellAction(){
//        $em=$this->getDoctrine()->getManager();
//        $topSell=$em->getRepository(TopSelling::class)-> findAll();
//        $productArray=[];
//        foreach ($topSell as $top){
//            $TopSellID=$top->getId();
//            $TopProduct =$em->getRepository(Products::class)->find($TopSellID);
//            $productArray[]=$TopProduct;
//        }
//        dump($productArray);
//        die;
//        return $this->render('Pages/products.html.twig',array(
//            'TopSelling'=>$productArray
//        ));
//    }

}
