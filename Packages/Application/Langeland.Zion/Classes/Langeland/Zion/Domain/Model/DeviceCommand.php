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
class DeviceCommand extends AbstractModel
{
    /**
     * Command timestamp (UTC).
     *
     * @var \DateTime
     * @ORM\Column(nullable=true)
     */
    protected $timestamp;

    /**
     * Associated user identifier.
     *
     * @var integer
     * @ORM\Column(nullable=true)
     */
    protected $userId;

    /**
     * Command name.
     *
     * @var string
     * @ORM\Column(nullable=true)
     */
    protected $command;

    /**
     * Command parameters, a JSON object with an arbitrary structure.
     *
     * @var array
     * @ORM\Column(nullable=true, type="json_array")
     */
    protected $parameters;

    /**
     * Command lifetime, a number of seconds until this command expires.
     *
     * @var integer
     * @ORM\Column(nullable=true)
     */
    protected $lifetime;

    /**
     * Command status, as reported by device or related infrastructure.
     *
     * @var string
     * @ORM\Column(nullable=true)
     */
    protected $status;

    /**
     * Command execution result, an optional value that could be provided by device.
     *
     * @var array
     * @ORM\Column(nullable=true, type="json_array")
     */
    protected $result;
}
