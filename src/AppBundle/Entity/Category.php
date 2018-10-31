<?php
/**
 * Created by PhpStorm.
 * User: Comp
 * Date: 10/27/2018
 * Time: 11:05 PM
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="category")
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $categoryName;
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Products",  mappedBy="category")
     */
    private $products;
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
    public function getCategoryName ()
    {
        return $this->categoryName;
    }

    /**
     * @param mixed $categoryName
     */
    public function setCategoryName ($categoryName)
    {
        $this->categoryName = $categoryName;
    }

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