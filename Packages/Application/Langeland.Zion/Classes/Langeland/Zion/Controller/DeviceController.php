<?php
namespace Langeland\Zion\Controller;

/*
 * This file is part of the Langeland.Zion package.
 */

use TYPO3\Flow\Annotations as Flow;

class DeviceController extends \TYPO3\Flow\Mvc\Controller\ActionController
{
    /**
     * @var string
     */
    protected $defaultViewObjectName = 'TYPO3\Flow\Mvc\View\JsonView';

    /**
     * Registers or updates a device. For initial device registration, only 'name' and 'deviceClass' properties are required.
     */

    /**
     * @param string $id
     * @param array $deviceClass
     * @param string $key
     * @param string $name
     * @param string $status
     * @param array $date
     */
    public function registerAction($id, $deviceClass, $key = null, $name = null, $status = null, $date = null)
    {
        $args = func_get_args();
        \TYPO3\Flow\var_dump(func_get_args());
        die('lala');

    }
}