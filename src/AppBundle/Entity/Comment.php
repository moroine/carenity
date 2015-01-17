<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\CommentRepository")
 */
class Comment {

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
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @var \AppBundle\Entity\Tool
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tool")
     * @ORM\JoinColumn(nullable=true)
     */
    private $tool;

    /**
     * @var \AppBundle\Entity\Loan
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Loan")
     * @ORM\JoinColumn(nullable=true)
     */
    private $loan;

    /**
     *
     * @param string|null $content
     */
    public function __construct(string $content = null) {
        $this->setContent($content);
        $this->user = null;
        $this->tool = null;
        $this->loan = null;
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
     * Set content
     *
     * @param string $content
     * @return \AppBundle\Entity\Comment
     */
    public function setContent($content) {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent() {
        return $this->content;
    }

    /**
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser() {
        return $this->user;
    }

    /**
     *
     * @return \AppBundle\Entity\Tool
     */
    public function getTool() {
        return $this->tool;
    }

    /**
     *
     * @return \AppBundle\Entity\Loan
     */
    public function getLoan() {
        return $this->loan;
    }

    /**
     *
     * @param \AppBundle\Entity\User $user
     * @return \AppBundle\Entity\Comment
     */
    public function setUser(User $user) {
        $this->user = $user;

        return $this;
    }

    /**
     *
     * @param \AppBundle\Entity\Tool $tool
     * @return \AppBundle\Entity\Comment
     */
    public function setTool(Tool $tool) {
        $this->tool = $tool;

        return $this;
    }

    /**
     *
     * @param \AppBundle\Entity\Loan $loan
     * @return \AppBundle\Entity\Comment
     */
    public function setLoan(Loan $loan) {
        $this->loan = $loan;

        return $this;
    }

}
