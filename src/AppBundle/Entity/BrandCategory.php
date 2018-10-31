<?php
/**
 * Created by PhpStorm.
 * User: Comp
 * Date: 10/27/2018
 * Time: 11:59 PM
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="brand_category")
 */
class BrandCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $BrandName;

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

    /**
     * @return mixed
     */
    public function getBrandName ()
    {
        return $this->BrandName;
    }

    /**
     * @param mixed $BrandName
     */
    public function setBrandName ($BrandName)
    {
        $this->BrandName = $BrandName;
    }
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Products",  mappedBy="brandCategory")
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
}