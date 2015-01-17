<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Loan
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\LoanRepository")
 */
class Loan {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="begin", type="datetime")
     */
    private $begin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="datetime")
     */
    private $end;

    /**
     *
     * @var \AppBundle\Entity\Tool
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tool")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tool;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $borrower;

    /**
     *
     * @param \DateTime|null $begin
     * @param \DateTime|null $end
     */
    public function __construct(\DateTime $begin = null, \DateTime $end = null) {
        $this->setBegin($begin);
        $this->setEnd($end);
        $this->tool = null;
        $this->borrower = null;
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
     * Set begin
     *
     * @param \DateTime $begin
     * @return \AppBundle\Entity\Loan
     */
    public function setBegin($begin) {
        $this->begin = $begin;

        return $this;
    }

    /**
     * Get begin
     *
     * @return \DateTime
     */
    public function getBegin() {
        return $this->begin;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     * @return \AppBundle\Entity\Loan
     */
    public function setEnd($end) {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd() {
        return $this->end;
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
     * @return \AppBundle\Entity\User
     */
    public function getBorrower() {
        return $this->borrower;
    }

    /**
     *
     * @param \AppBundle\Entity\Tool $tool
     * @return \AppBundle\Entity\Loan
     */
    public function setTool(Tool $tool) {
        $this->tool = $tool;

        return $this;
    }

    /**
     *
     * @param \AppBundle\Entity\User $borrower
     * @return \AppBundle\Entity\Loan
     */
    public function setBorrower(User $borrower) {
        $this->borrower = $borrower;

        return $this;
    }

}
