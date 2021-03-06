<?php

namespace Worldskills\CareBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Options
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Options
{
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Subject")
     */
    private $subject;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="VoteThread")
     */
    private $voteThread;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Worldskills\UserBundle\Entity\User")
     */
    private $user;

    public function __construct() {
        $this->datetime = new \DateTime();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Options
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set subject
     *
     * @param \Worldskills\CareBundle\Entity\Subject $subject
     * @return Options
     */
    public function setSubject(\Worldskills\CareBundle\Entity\Subject $subject = null)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return \Worldskills\CareBundle\Entity\Subject 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set voteThread
     *
     * @param \Worldskills\CareBundle\Entity\VoteThread $voteThread
     * @return Options
     */
    public function setVoteThread(\Worldskills\CareBundle\Entity\VoteThread $voteThread = null)
    {
        $this->voteThread = $voteThread;

        return $this;
    }

    /**
     * Get voteThread
     *
     * @return \Worldskills\CareBundle\Entity\VoteThread 
     */
    public function getVoteThread()
    {
        return $this->voteThread;
    }

    /**
     * @ORM\PrePersist()
     */
    public function addVoteThread() {
        $this->voteThread = new VoteThread();
    }

    /**
     * Set user
     *
     * @param \Worldskills\UserBundle\Entity\User $user
     * @return Options
     */
    public function setUser(\Worldskills\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Worldskills\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
