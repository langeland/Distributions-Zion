<?php
namespace Langeland\Zion\Controller;

/*
 * This file is part of the Langeland.Zion package.
 */

use TYPO3\Flow\Annotations as Flow;

class DeviceNotificationController extends \TYPO3\Flow\Mvc\Controller\ActionController
{
    /**
     * @var string
     */
    protected $defaultViewObjectName = 'TYPO3\Flow\Mvc\View\JsonView';

    /**
     * @var \Langeland\Zion\Domain\Repository\DeviceRepository
     * @Flow\Inject
     */
    var $deviceRepository;

    /**
     * @var \Langeland\Zion\Domain\Repository\DeviceNotificationRepository
     * @Flow\Inject
     */
    var $deviceNotificationRepository;

    /**
     * @param string $deviceGuid
     * @param string $notification
     * @param array $parameters
     */
    public function insertAction($deviceGuid, $notification, $parameters = array())
    {

        if (!$device = $this->deviceRepository->findByIdentifier($deviceGuid)) {
            die('404 - device not found');
        }

        $deviceNotification = new \Langeland\Zion\Domain\Model\DeviceNotification();
        $deviceNotification
            ->setTimestamp(new \DateTime())
            ->setNotification($notification)
            ->setParameters($parameters)
            ->setDevice($device);

        $this->deviceNotificationRepository->add($deviceNotification);

        $this->view->assign('value', array(
            'id' => $deviceNotification->getIdentifier(),
            'timestamp' => $deviceNotification->getTimestamp()->format('c')
        ));
    }
}