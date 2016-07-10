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
class Device extends AbstractModel
{
    /**
     * @var \Langeland\Zion\Domain\Repository\DeviceNotificationRepository
     * @Flow\Inject
     */
    protected $deviceNotificationRepository;

    /**
     * Device authentication key. The key is set during device registration and it has to be provided for all subsequent
     * calls initiated by device. The key maximum length is 64 characters.
     *
     * @var string
     * @ORM\Column(nullable=true)
     */
    protected $key;

    /**
     * Device display name.
     *
     * @var string
     * @ORM\Column(nullable=true)
     */
    protected $name;

    /**
     * Device operation status. The status is optional and it can be set to an arbitrary value, if applicable.
     * If device status monitoring feature is enabled, the framework will set status value to 'Offline' after defined
     * period of inactivity.
     *
     * @var string
     * @ORM\Column(nullable=true)
     */
    protected $status;

    /**
     * Device data, a JSON object with an arbitrary structure.
     *
     * @var array
     * @ORM\Column(nullable=true, type="json_array")
     */
    protected $data;

    /**
     * Associated network object.
     *
     * @var \Langeland\Zion\Domain\Model\Network
     * @ORM\ManyToOne(inversedBy="devices")
     */
    protected $network;

    /**
     * Associated device class object.
     *
     * @var \Langeland\Zion\Domain\Model\DeviceClass
     * @ORM\ManyToOne(inversedBy="devices")
     */
    protected $deviceClass;

    /**
     * @var \Doctrine\Common\Collections\Collection<\Langeland\Zion\Domain\Model\DeviceNotification>
     * @Flow\Lazy
     * @ORM\OneToMany(mappedBy="device")
     */
    protected $deviceNotifications;

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
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return Device
     */
    public function setKey($key)
    {
        $this->key = $key;

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
     * @return Device
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Device
     */
    public function setStatus($status)
    {
        $this->status = $status;

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
     * @return Device
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return Network
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * @param Network $network
     * @return Device
     */
    public function setNetwork($network)
    {
        $this->network = $network;

        return $this;
    }

    /**
     * @return DeviceClass
     */
    public function getDeviceClass()
    {
        return $this->deviceClass;
    }

    /**
     * @param DeviceClass $deviceClass
     * @return Device
     */
    public function setDeviceClass($deviceClass)
    {
        $this->deviceClass = $deviceClass;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDeviceNotifications()
    {
        return $this->deviceNotifications;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $deviceNotifications
     * @return Device
     */
    public function setDeviceNotifications($deviceNotifications)
    {
        $this->deviceNotifications = $deviceNotifications;

        return $this;
    }

    /**
     * @return \Langeland\Zion\Domain\Model\DeviceNotification
     */
    public function getLastDeviceNotification()
    {
        return $this->deviceNotificationRepository->findLastByNode($this);
    }
}
