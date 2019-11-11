<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * PHP version 5
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace WindowsAzure\ServiceBus\Models;

/**
 * The subscription description.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      http://msdn.microsoft.com/en-us/library/windowsazure/hh780763
 */
class CountDetails
{
    /**
     * @var int
     */
    private $_activeMessageCount;

    /**
     * @var int
     */
    private $_deadLetterMessageCount;

    /**
     * @var int
     */
    private $_scheduledMessageCount;

    /**
     * @var int
     */
    private $_transferMessageCount;

    /**
     * @var int
     */
    private $_transferDeadLetterMessageCount;

    public static function create($countDetailsArray) {
        $countDetails = new self();

        if (array_key_exists('ActiveMessageCount', $countDetailsArray)) {
            $countDetails->setActiveMessageCount(
                (int)$countDetailsArray['ActiveMessageCount']
            );
        }

        if (array_key_exists('DeadLetterMessageCount', $countDetailsArray)) {
            $countDetails->setDeadLetterMessageCount(
                (int)$countDetailsArray['DeadLetterMessageCount']
            );
        }

        if (array_key_exists('ScheduledMessageCount', $countDetailsArray)) {
            $countDetails->setScheduledMessageCount(
                (int)$countDetailsArray['ScheduledMessageCount']
            );
        }

        if (array_key_exists('TransferMessageCount', $countDetailsArray)) {
            $countDetails->setTransferMessageCount(
                (int)$countDetailsArray['TransferMessageCount']
            );
        }

        if (array_key_exists('TransferDeadLetterMessageCount', $countDetailsArray)) {
            $countDetails->setTransferDeadLetterMessageCount(
                (int)$countDetailsArray['TransferDeadLetterMessageCount']
            );
        }

        return $countDetails;
    }

    /**
     * @return int
     */
    public function getActiveMessageCount()
    {
        return $this->_activeMessageCount;
    }

    /**
     * @param int $activeMessageCount
     */
    public function setActiveMessageCount($activeMessageCount)
    {
        $this->_activeMessageCount = $activeMessageCount;
    }

    /**
     * @return int
     */
    public function getDeadLetterMessageCount()
    {
        return $this->_deadLetterMessageCount;
    }

    /**
     * @param int $deadLetterMessageCount
     */
    public function setDeadLetterMessageCount($deadLetterMessageCount)
    {
        $this->_deadLetterMessageCount = $deadLetterMessageCount;
    }

    /**
     * @return int
     */
    public function getScheduledMessageCount()
    {
        return $this->_scheduledMessageCount;
    }

    /**
     * @param int $scheduledMessageCount
     */
    public function setScheduledMessageCount($scheduledMessageCount)
    {
        $this->_scheduledMessageCount = $scheduledMessageCount;
    }

    /**
     * @return int
     */
    public function getTransferMessageCount()
    {
        return $this->_transferMessageCount;
    }

    /**
     * @param int $transferMessageCount
     */
    public function setTransferMessageCount($transferMessageCount)
    {
        $this->_transferMessageCount = $transferMessageCount;
    }

    /**
     * @return int
     */
    public function getTransferDeadLetterMessageCount()
    {
        return $this->_transferDeadLetterMessageCount;
    }

    /**
     * @param int $transferDeadLetterMessageCount
     */
    public function setTransferDeadLetterMessageCount($transferDeadLetterMessageCount)
    {
        $this->_transferDeadLetterMessageCount = $transferDeadLetterMessageCount;
    }
}