<?php
namespace Langeland\Zion\Domain\Model;

/*
 * This file is part of the Langeland.Zion package.
 */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

abstract class AbstractModel
{
    /**
     * Unique identifier.
     *
     * @var integer
     * @Flow\Identity
     * @ORM\Column(type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $identifier;
}
