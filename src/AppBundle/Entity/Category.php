<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="frenchValue", type="string", length=255, nullable=true)
     */
    private $frenchValue;

    /**
     * @var string
     *
     * @ORM\Column(name="englishValue", type="string", length=255, nullable=true)
     */
    private $englishValue;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set frenchValue
     *
     * @param string $frenchValue
     *
     * @return Category
     */
    public function setFrenchValue($frenchValue)
    {
        $this->frenchValue = $frenchValue;

        return $this;
    }

    /**
     * Get frenchValue
     *
     * @return string
     */
    public function getFrenchValue()
    {
        return $this->frenchValue;
    }

    /**
     * Set englishValue
     *
     * @param string $englishValue
     *
     * @return Category
     */
    public function setEnglishValue($englishValue)
    {
        $this->englishValue = $englishValue;

        return $this;
    }

    /**
     * Get englishValue
     *
     * @return string
     */
    public function getEnglishValue()
    {
        return $this->englishValue;
    }
    public function __toString()
    {
        return $this->getEnglishValue();
    }
}

