<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use AppBundle\Entity\Geography;
use AppBundle\Entity\Category;
use AppBundle\Entity\UserRole;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * User
 *
 * @ORM\Table(name="app_users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @Vich\Uploadable
 */
class User implements AdvancedUserInterface, \Serializable
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
     * @ORM\Column(name="username", type="string", length=64, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=64)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var bool
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255)
     */
    private $picture;
    /**
     * @Vich\UploadableField(mapping="user_images", fileNameProperty="picture")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(name="updatedAt",type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var UserRole
     *
     * @ORM\ManyToOne(targetEntity="UserRole", fetch="LAZY")
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id")
    */
    private $roles;
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
     * @ORM\Column(name="facebookAuth", type="string", length=255)
     */
    private $facebookAuth;

    /**
     * @var string
     *
     * @ORM\Column(name="twitterAuth", type="string", length=255)
     */
    private $twitterAuth;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedinAuth", type="string", length=255)
     */
    private $linkedinAuth;

    public function __construct()
    {
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid('', true));
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username.
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }


    public function eraseCredentials()
    {
    }
    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->isActive,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->isActive,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized, array('allowed_classes' => false));
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isActive.
     *
     * @param bool $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive.
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set firstName.
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName.
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set picture.
     *
     * @param string $picture
     *
     * @return User
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture.
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }


    public function setImageFile(File $picture = null)
    {
        $this->imageFile = $picture;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($picture) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set roles.
     *
     * @param string $roles
     *
     * @return Post
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     *  @return array
     */
    public function getRoles()
    {
        //print_r($this->roles);
        return array('ROLE_ADMIN');//$this->roles;
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
     * Set facebookAuth.
     *
     * @param string $facebookAuth
     *
     * @return User
     */
    public function setFacebookAuth($facebookAuth)
    {
        $this->facebookAuth = $facebookAuth;

        return $this;
    }

    /**
     * Get facebookAuth.
     *
     * @return string
     */
    public function getFacebookAuth()
    {
        return $this->facebookAuth;
    }

    /**
     * Set twitterAuth.
     *
     * @param string $twitterAuth
     *
     * @return User
     */
    public function setTwitterAuth($twitterAuth)
    {
        $this->twitterAuth = $twitterAuth;

        return $this;
    }

    /**
     * Get twitterAuth.
     *
     * @return string
     */
    public function getTwitterAuth()
    {
        return $this->twitterAuth;
    }

    /**
     * Set linkedinAuth.
     *
     * @param string $linkedinAuth
     *
     * @return User
     */
    public function setLinkedinAuth($linkedinAuth)
    {
        $this->linkedinAuth = $linkedinAuth;

        return $this;
    }

    /**
     * Get linkedinAuth.
     *
     * @return string
     */
    public function getLinkedinAuth()
    {
        return $this->linkedinAuth;
    }
}
