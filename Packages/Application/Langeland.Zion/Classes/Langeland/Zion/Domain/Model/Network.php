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
class Network extends AbstractModel
{
    /**
     * Optional key that is used to protect the network from unauthorized device registrations. When defined, devices
     * will need to pass the key in order to register to the current network.
     *
     * @var string
     * @ORM\Column(nullable=true)
     */
    protected $key;

    /**
     * Network display name.
     *
     * @var string
     * @ORM\Column(nullable=true)
     */
    protected $name;

    /**
     * Network description.
     *
     * @var string
     * @ORM\Column(nullable=true)
     */
    protected $description;

    /**
     * @var \Doctrine\Common\Collections\Collection<\Langeland\Zion\Domain\Model\Device>
     * @ORM\OneToMany(mappedBy="network")
     */
    protected $devices;
}
