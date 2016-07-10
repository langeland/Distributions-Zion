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
class DeviceClass extends AbstractModel
{
    /**
     * Device class display name.
     *
     * @var string
     */
    protected $name;

    /**
     * Device class version.
     *
     * @var string
     * @ORM\Column(nullable=true)
     */
    protected $version;

    /**
     * Indicates whether device class is permanent. Permanent device classes could not be modified by devices during
     * registration.
     *
     * @var boolean
     */
    protected $isPermanent;

    /**
     * If set, specifies inactivity timeout in seconds before the framework changes device status to 'Offline'. Device
     * considered inactive when it's not persistently connected and does not send any notifications.
     *
     * @var integer
     */
    protected $offlineTimeout;

    /**
     * Device class data, a JSON object with an arbitrary structure.
     *
     * @var array
     * @ORM\Column(nullable=true, type="json_array")
     */
    protected $data;

    /**
     * @var \Doctrine\Common\Collections\Collection<\Langeland\Zion\Domain\Model\Equipment>
     * @ORM\OneToMany(mappedBy="deviceClass")
     */
    protected $equipment;

    /**
     * @var \Doctrine\Common\Collections\Collection<\Langeland\Zion\Domain\Model\Device>
     * @ORM\OneToMany(mappedBy="deviceClass")
     */
    protected $devices;

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DeviceClass
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return DeviceClass
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isIsPermanent()
    {
        return $this->isPermanent;
    }

    /**
     * @param boolean $isPermanent
     * @return DeviceClass
     */
    public function setIsPermanent($isPermanent)
    {
        $this->isPermanent = $isPermanent;

        return $this;
    }

    /**
     * @return int
     */
    public function getOfflineTimeout()
    {
        return $this->offlineTimeout;
    }

    /**
     * @param int $offlineTimeout
     * @return DeviceClass
     */
    public function setOfflineTimeout($offlineTimeout)
    {
        $this->offlineTimeout = $offlineTimeout;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return DeviceClass
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEquipment()
    {
        return $this->equipment;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $equipment
     * @return DeviceClass
     */
    public function setEquipment($equipment)
    {
        $this->equipment = $equipment;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDevices()
    {
        return $this->devices;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $devices
     * @return DeviceClass
     */
    public function setDevices($devices)
    {
        $this->devices = $devices;

        return $this;
    }
}
