<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

trait IdTrait
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @return null|int
     */
    public function getId()
    {
        return $this->id;
    }
}
