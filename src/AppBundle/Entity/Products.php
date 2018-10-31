<?php
/**
 * Created by PhpStorm.
 * User: Comp
 * Date: 10/27/2018
 * Time: 11:09 PM
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */
class Products
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $productName;
    /**
     * @ORM\Column(type="string")
     */
    private $description;
    /**
     * @ORM\Column(type="string")
     */
    private $price;
    /**
     * @ORM\Column(type="string")
     */
    private $rebatePrice;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Category", inversedBy="products")
     */
    private $category;
    /**
     * @ORM\Column(type="string")
     */
    private $photo;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\BrandCategory", inversedBy="products")
     */
    private $brandCategory;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TopSelling", inversedBy="products")
     */
    private $topSelling;
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
    public function getProductName ()
    {
        return $this->productName;
    }

    /**
     * @param mixed $productName
     */
    public function setProductName ($productName)
    {
        $this->productName = $productName;
    }

    /**
     * @return mixed
     */
    public function getDescription ()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription ($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice ()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice ($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getRebatePrice ()
    {
        return $this->rebatePrice;
    }

    /**
     * @param mixed $rebatePrice
     */
    public function setRebatePrice ($rebatePrice)
    {
        $this->rebatePrice = $rebatePrice;
    }

    /**
     * @return mixed
     */
    public function getCategory ()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory ($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getBrandCategory ()
    {
        return $this->brandCategory;
    }

    /**
     * @param mixed $brandCategory
     */
    public function setBrandCategory ($brandCategory)
    {
        $this->brandCategory = $brandCategory;
    }

    /**
     * @return mixed
     */
    public function getPhoto ()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto ($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getTopSelling ()
    {
        return $this->topSelling;
    }

    /**
     * @param mixed $topSelling
     */
    public function setTopSelling ($topSelling)
    {
        $this->topSelling = $topSelling;
    }


}