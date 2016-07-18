<?php
namespace Langeland\ZionFrontend\Controller;

/*
 * This file is part of the Langeland.ZionFrontend package.
 */

use TYPO3\Flow\Annotations as Flow;

class MainController extends \TYPO3\Flow\Mvc\Controller\ActionController
{
    /**
     * @var \Langeland\Zion\Domain\Repository\DeviceRepository
     * @Flow\Inject
     */
    var $deviceRepository;

    /**
     * @return void
     */
    public function indexAction()
    {
        $devices = $this->deviceRepository->findAll();
        $this->view->assign('devices', $devices);
    }

    /**
     * @param \Langeland\Zion\Domain\Model\Device $device
     * @return void
     */
    public function deviceAction(\Langeland\Zion\Domain\Model\Device $device)
    {
        $this->view->assign('device', $device);
    }
}
