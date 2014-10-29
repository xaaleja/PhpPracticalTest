<?php
namespace PhpPracticalTest\ApiBundle\Model;

Interface ProductsInterface
{
    /**
     * Set id
     *
     * @param integer $id
     * @return ProductsInterface
     */
    public function setId($id);

    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Set categoryId
     *
     * @param integer $categoryId
     * @return Products
     */
    public function setCategoryId($category_id);

    /**
     * Get categoryId
     *
     * @return integer
     */
    public function getCategoryId();

    /**
     * Set productName
     *
     * @param string $productName
     * @return Products
     */
    public function setProductName($productName);

    /**
     * Get productName
     *
     * @return string
     */
    public function getProductName();

    /**
     * Set productPrice
     *
     * @param float $productPrice
     * @return Products
     */
    public function setProductPrice($productPrice);

    /**
     * Get productPrice
     *
     * @return float
     */
    public function getProductPrice();

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Products
     */
    public function setUpdatedAt($updatedAt);

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt();
}
