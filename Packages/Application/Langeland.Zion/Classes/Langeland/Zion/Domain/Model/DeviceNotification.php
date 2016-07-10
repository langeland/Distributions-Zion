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
class DeviceNotification extends AbstractModel
{
    /**
     * @var \DateTime
     */
    protected $timestamp;

    /**
     * @var string
     */
    protected $notification;

    /**
     * @var array
     * @ORM\Column(nullable=true, type="json_array")
     */
    protected $parameters;

    /**
     * @var \Langeland\Zion\Domain\Model\Device
     * @ORM\ManyToOne(inversedBy="deviceNotifications")
     */
    protected $device;

    /**
     * @var bool
     */
    protected $indexed = false;

    /**
     * @return int
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param int $identifier
     * @return AbstractModel
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param \DateTime $timestamp
     * @return DeviceNotification
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * @return string
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * @param string $notification
     * @return DeviceNotification
     */
    public function setNotification($notification)
    {
        $this->notification = $notification;

        return $this;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     * @return DeviceNotification
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * @return Device
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * @param Device $device
     * @return DeviceNotification
     */
    public function setDevice($device)
    {
        $this->device = $device;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isIndexed()
    {
        return $this->indexed;
    }

    /**
     * @param boolean $indexed
     * @return DeviceNotification
     */
    public function setIndexed($indexed)
    {
        $this->indexed = $indexed;

        return $this;
    }
}
