<?php
namespace Langeland\Zion\Domain\Model;

/*
 * This file is part of the Langeland.Zion package.
 */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Equipment extends AbstractModel
{
    /**
     * Equipment display name.
     *
     * @var string
     * @ORM\Column(nullable=true)
     */
    protected $name;

    /**
     * Equipment code. It's used to reference particular equipment and it should be unique within a device class.
     *
     * @var string
     */
    protected $code;

    /**
     * Equipment type. An arbitrary string representing equipment capabilities.
     *
     * @var string
     * @ORM\Column(nullable=true)
     */
    protected $type;

    /**
     * Equipment data, a JSON object with an arbitrary structure.
     *
     * @var array
     * @ORM\Column(nullable=true, type="json_array")
     */
    protected $data;

    /**
     * @var \Langeland\Zion\Domain\Model\DeviceClass
     * @ORM\ManyToOne(inversedBy="equipment")
     */
    protected $deviceClass;
}
