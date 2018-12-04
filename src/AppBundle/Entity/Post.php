<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Geography;
use AppBundle\Entity\Category;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 * @Vich\Uploadable
 */
class Post
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
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="post_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(name="updatedAt",type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="releaseDate", type="datetime")
     */
    private $releaseDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="sendPushNotification", type="boolean")
     */
    private $sendPushNotification;

    /**
     * @var Georgraphy
     *
     * @ORM\ManyToOne(targetEntity="Geography", fetch="LAZY")
     * @ORM\JoinColumn(name="georgraphy_id", referencedColumnName="id")
     */
    private $geography;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Category", fetch="LAZY")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="frenchTitle", type="string", length=255)
     */
    private $frenchTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="frenchSlug", type="string", length=255)
     */
    private $frenchSlug;

    /**
     * @var string
     *
     * @ORM\Column(name="frenchDescription", type="text")
     */
    private $frenchDescription;

    /**
     * @var bool
     *
     * @ORM\Column(name="frenchAvailable", type="boolean")
     */
    private $frenchAvailable;

    /**
     * @var bool
     *
     * @ORM\Column(name="frenchFacebookSharingAvailable", type="boolean")
     */
    private $frenchFacebookSharingAvailable;

    /**
     * @var string
     *
     * @ORM\Column(name="frenchFacebookUrlToShare", type="string", length=255)
     */
    private $frenchFacebookUrlToShare;

    /**
     * @var bool
     *
     * @ORM\Column(name="frenchTwitterSharingAvailable", type="boolean")
     */
    private $frenchTwitterSharingAvailable;

    /**
     * @var string
     *
     * @ORM\Column(name="frenchTwitterUrlToShare", type="string", length=255)
     */
    private $frenchTwitterUrlToShare;

    /**
     * @var bool
     *
     * @ORM\Column(name="frenchLinkedinSharingAvailable", type="boolean")
     */
    private $frenchLinkedinSharingAvailable;

    /**
     * @var string
     *
     * @ORM\Column(name="frenchLinkedinUrlToShare", type="string", length=255)
     */
    private $frenchLinkedinUrlToShare;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set mainPicture.
     *
     * @param string|null $mainPicture
     *
     * @return Post
     */
    public function setImage($image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get mainPicture.
     *
     * @return string|null
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set status.
     *
     * @param string|null $status
     *
     * @return Post
     */
    public function setStatus($status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime $updatedAt
     *
     * @return Post
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set releaseDate.
     *
     * @param \DateTime $releaseDate
     *
     * @return Post
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate.
     *
     * @return \DateTime
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set sendPushNotification.
     *
     * @param bool $sendPushNotification
     *
     * @return Post
     */
    public function setSendPushNotification($sendPushNotification)
    {
        $this->sendPushNotification = $sendPushNotification;

        return $this;
    }

    /**
     * Get sendPushNotification.
     *
     * @return bool
     */
    public function getSendPushNotification()
    {
        return $this->sendPushNotification;
    }

    /**
     * Set geography.
     *
     * @param string $geography
     *
     * @return Post
     */
    public function setGeography($geography)
    {
        $this->geography = $geography;

        return $this;
    }

    /**
     * Get geography.
     *
     * @return string
     */
    public function getGeography()
    {
        return $this->geography;
    }

    /**
     * Set category.
     *
     * @param string $category
     *
     * @return Post
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category.
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set frenchTitle.
     *
     * @param string $frenchTitle
     *
     * @return Post
     */
    public function setFrenchTitle($frenchTitle)
    {
        $this->frenchTitle = $frenchTitle;

        return $this;
    }

    /**
     * Get frenchTitle.
     *
     * @return string
     */
    public function getFrenchTitle()
    {
        return $this->frenchTitle;
    }

    /**
     * Set frenchSlug.
     *
     * @param string $frenchSlug
     *
     * @return Post
     */
    public function setFrenchSlug($frenchSlug)
    {
        $this->frenchSlug = $frenchSlug;

        return $this;
    }

    /**
     * Get frenchSlug.
     *
     * @return string
     */
    public function getFrenchSlug()
    {
        return $this->frenchSlug;
    }

    /**
     * Set frenchDescription.
     *
     * @param string $frenchDescription
     *
     * @return Post
     */
    public function setFrenchDescription($frenchDescription)
    {
        $this->frenchDescription = $frenchDescription;

        return $this;
    }

    /**
     * Get frenchDescription.
     *
     * @return string
     */
    public function getFrenchDescription()
    {
        return $this->frenchDescription;
    }

    /**
     * Set frenchAvailable.
     *
     * @param bool $frenchAvailable
     *
     * @return Post
     */
    public function setFrenchAvailable($frenchAvailable)
    {
        $this->frenchAvailable = $frenchAvailable;

        return $this;
    }

    /**
     * Get frenchAvailable.
     *
     * @return bool
     */
    public function getFrenchAvailable()
    {
        return $this->frenchAvailable;
    }

    /**
     * Set frenchFacebookSharingAvailable.
     *
     * @param bool $frenchFacebookSharingAvailable
     *
     * @return Post
     */
    public function setFrenchFacebookSharingAvailable($frenchFacebookSharingAvailable)
    {
        $this->frenchFacebookSharingAvailable = $frenchFacebookSharingAvailable;

        return $this;
    }

    /**
     * Get frenchFacebookSharingAvailable.
     *
     * @return bool
     */
    public function getFrenchFacebookSharingAvailable()
    {
        return $this->frenchFacebookSharingAvailable;
    }

    /**
     * Set frenchFacebookUrlToShare.
     *
     * @param string $frenchFacebookUrlToShare
     *
     * @return Post
     */
    public function setFrenchFacebookUrlToShare($frenchFacebookUrlToShare)
    {
        $this->frenchFacebookUrlToShare = $frenchFacebookUrlToShare;

        return $this;
    }

    /**
     * Get frenchFacebookUrlToShare.
     *
     * @return string
     */
    public function getFrenchFacebookUrlToShare()
    {
        return $this->frenchFacebookUrlToShare;
    }

    /**
     * Set frenchTwitterSharingAvailable.
     *
     * @param bool $frenchTwitterSharingAvailable
     *
     * @return Post
     */
    public function setFrenchTwitterSharingAvailable($frenchTwitterSharingAvailable)
    {
        $this->frenchTwitterSharingAvailable = $frenchTwitterSharingAvailable;

        return $this;
    }

    /**
     * Get frenchTwitterSharingAvailable.
     *
     * @return bool
     */
    public function getFrenchTwitterSharingAvailable()
    {
        return $this->frenchTwitterSharingAvailable;
    }

    /**
     * Set frenchTwitterUrlToShare.
     *
     * @param string $frenchTwitterUrlToShare
     *
     * @return Post
     */
    public function setFrenchTwitterUrlToShare($frenchTwitterUrlToShare)
    {
        $this->frenchTwitterUrlToShare = $frenchTwitterUrlToShare;

        return $this;
    }

    /**
     * Get frenchTwitterUrlToShare.
     *
     * @return string
     */
    public function getFrenchTwitterUrlToShare()
    {
        return $this->frenchTwitterUrlToShare;
    }

    /**
     * Set frenchLinkedinSharingAvailable.
     *
     * @param bool $frenchLinkedinSharingAvailable
     *
     * @return Post
     */
    public function setFrenchLinkedinSharingAvailable($frenchLinkedinSharingAvailable)
    {
        $this->frenchLinkedinSharingAvailable = $frenchLinkedinSharingAvailable;

        return $this;
    }

    /**
     * Get frenchLinkedinSharingAvailable.
     *
     * @return bool
     */
    public function getFrenchLinkedinSharingAvailable()
    {
        return $this->frenchLinkedinSharingAvailable;
    }

    /**
     * Set frenchLinkedinUrlToShare.
     *
     * @param string $frenchLinkedinUrlToShare
     *
     * @return Post
     */
    public function setFrenchLinkedinUrlToShare($frenchLinkedinUrlToShare)
    {
        $this->frenchLinkedinUrlToShare = $frenchLinkedinUrlToShare;

        return $this;
    }

    /**
     * Get frenchLinkedinUrlToShare.
     *
     * @return string
     */
    public function getFrenchLinkedinUrlToShare()
    {
        return $this->frenchLinkedinUrlToShare;
    }
}
