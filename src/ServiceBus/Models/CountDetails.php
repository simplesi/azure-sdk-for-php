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
class CountDetails {
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

    public static function create($countDetailsXmlElement) {
        /* @var \SimpleXMLElement $countDetailsXmlElement*/
        $countDetailsXmlElement->registerXPathNamespace(
            'd3p1',
            'http://schemas.microsoft.com/netservices/2011/06/servicebus'
        );
        $countDetails = new self();

        $activeMessageCount = $countDetailsXmlElement->xpath('//d3p1:ActiveMessageCount');
        if (count($activeMessageCount) > 0) {
            $countDetails->setActiveMessageCount(
                (int) $activeMessageCount[0]
            );
        }

        $deadLetterMessageCount = $countDetailsXmlElement->xpath('//d3p1:DeadLetterMessageCount');
        if (count($deadLetterMessageCount) > 0) {
            $countDetails->setDeadLetterMessageCount(
                (int) $deadLetterMessageCount[0]
            );
        }

        $scheduledMessageCount = $countDetailsXmlElement->xpath('//d3p1:ScheduledMessageCount');
        if (count($scheduledMessageCount) > 0) {
            $countDetails->setScheduledMessageCount(
                (int) $scheduledMessageCount[0]
            );
        }

        $transferMessageCount = $countDetailsXmlElement->xpath('//d3p1:TransferMessageCount');
        if (count($transferMessageCount) > 0) {
            $countDetails->setTransferMessageCount(
                (int) $transferMessageCount[0]
            );
        }

        $transferDeadLetterMessageCount = $countDetailsXmlElement->xpath('//d3p1:TransferDeadLetterMessageCount');
        if (count($transferDeadLetterMessageCount) > 0) {
            $countDetails->setTransferDeadLetterMessageCount(
                (int) $transferDeadLetterMessageCount[0]
            );
        }

        return $countDetails;
    }

    /**
     * @return int
     */
    public function getActiveMessageCount() {
        return $this->_activeMessageCount;
    }

    /**
     * @param int $activeMessageCount
     */
    public function setActiveMessageCount($activeMessageCount) {
        $this->_activeMessageCount = $activeMessageCount;
    }

    /**
     * @return int
     */
    public function getDeadLetterMessageCount() {
        return $this->_deadLetterMessageCount;
    }

    /**
     * @param int $deadLetterMessageCount
     */
    public function setDeadLetterMessageCount($deadLetterMessageCount) {
        $this->_deadLetterMessageCount = $deadLetterMessageCount;
    }

    /**
     * @return int
     */
    public function getScheduledMessageCount() {
        return $this->_scheduledMessageCount;
    }

    /**
     * @param int $scheduledMessageCount
     */
    public function setScheduledMessageCount($scheduledMessageCount) {
        $this->_scheduledMessageCount = $scheduledMessageCount;
    }

    /**
     * @return int
     */
    public function getTransferMessageCount() {
        return $this->_transferMessageCount;
    }

    /**
     * @param int $transferMessageCount
     */
    public function setTransferMessageCount($transferMessageCount) {
        $this->_transferMessageCount = $transferMessageCount;
    }

    /**
     * @return int
     */
    public function getTransferDeadLetterMessageCount() {
        return $this->_transferDeadLetterMessageCount;
    }

    /**
     * @param int $transferDeadLetterMessageCount
     */
    public function setTransferDeadLetterMessageCount($transferDeadLetterMessageCount) {
        $this->_transferDeadLetterMessageCount = $transferDeadLetterMessageCount;
    }
}