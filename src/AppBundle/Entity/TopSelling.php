<?php
/**
 * Created by PhpStorm.
 * User: Comp
 * Date: 10/29/2018
 * Time: 11:01 PM
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="top_selling")
 */
class TopSelling
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Products",  mappedBy="topSelling")
     */
    private $products;

    /**
     * @return mixed
     */
    public function getProducts ()
    {
        return $this->products;
    }

    /**
     * @param mixed $products
     */
    public function setProducts ($products)
    {
        $this->products = $products;
    }


    /**
     * @return mixed
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId ($id)
    {
        $this->id = $id;
    }




}