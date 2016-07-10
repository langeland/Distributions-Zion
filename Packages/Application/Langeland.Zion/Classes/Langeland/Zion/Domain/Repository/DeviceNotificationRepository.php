<?php
namespace Langeland\Zion\Domain\Repository;

/*
 * This file is part of the Langeland.Zion package.
 */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Persistence\Repository;

/**
 * @Flow\Scope("singleton")
 */
class DeviceNotificationRepository extends Repository
{
    // add customized methods here

    /**
     * @param int $limit
     * @return \TYPO3\Flow\Persistence\QueryResultInterface<\Langeland\Zion\Domain\Model\DeviceNotification>
     */
    public function findNonIndexed($limit = 100)
    {
        $query = $this->createQuery();

        $query
            ->setOrderings(array('timestamp' => \TYPO3\Flow\Persistence\QueryInterface::ORDER_DESCENDING))
            ->setLimit($limit)
            ->matching($query->equals('indexed', false));

        return $query->execute();
    }

    /**
     * @param \Langeland\Zion\Domain\Model\Device $device
     * @return \Langeland\Zion\Domain\Model\DeviceNotification
     */
    public function findLastByNode(\Langeland\Zion\Domain\Model\Device $device)
    {
        $query = $this->createQuery();

        $query
            ->setOrderings(array('timestamp' => \TYPO3\Flow\Persistence\QueryInterface::ORDER_DESCENDING))
            ->setLimit(1)
            ->matching(
                $query->equals('device', $device)
            );

        return $query->execute()->getFirst();
    }
}
