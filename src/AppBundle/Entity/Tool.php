<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tool
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ToolRepository")
 */
class Tool {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     *
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    /**
     *
     * @param string|null $name
     */
    public function __construct(string $name = null) {
        $this->setName($name);
        $this->owner = null;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Tool
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     *
     * @return \AppBundle\Entity\User
     */
    public function getOwner() {
        return $this->owner;
    }

    /**
     *
     * @param \AppBundle\Entity\User $owner
     * @return \AppBundle\Entity\Tool
     */
    public function setOwner(\AppBundle\Entity\User $owner) {
        $this->owner = $owner;

        return $this;
    }

}
