<?php
/**
 * Strattas
 * LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.strattasecomm.com/LICENSE.txt
 *
 * @category   Strattas
 * @package    Strattas_Core
 * @version    1.0
 * @copyright  Copyright (c) 2012 Strattas (http://www.strattasecomm.com)
 * @license    http://www.strattasecomm.com/LICENSE.txt
 */

class Strattas_Core_Model_Logger extends Mage_Core_Model_Abstract
{

    /** Notice */
    const LOG_SEVERITY_NOTICE = 1;
    /** Strict notice */
    const LOG_SEVERITY_STRICT_NOTICE = 2;
    /** Warning */
    const LOG_SEVERITY_WARNING = 4;
    /** Error */
    const LOG_SEVERITY_ERROR = 8;
    /** Fatal */
    const LOG_SEVERITY_FATAL = 8;

    protected function _construct()
    {
        $this->_init('stcore/logger');
    }

    /**
     * Prepares log entry for saving
     * @return Strattas_Core_Model_Log
     */
    public function _beforeSave()
    {
        if (!$this->getSeverity()) {
            $this->setSeverity(self::LOG_SEVERITY_NOTICE);
        }
        if (!$this->getDate()) {
            $this->setDate(now());
        }
        return parent::_beforeSave();
    }

    /**
     * Exorcise wrapper
     * @return
     */
    public function exorcise()
    {
        return Mage::helper('stcore/logger')->exorcise();
    }
}