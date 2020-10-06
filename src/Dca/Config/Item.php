<?php

namespace Lupcom\Globals\Dca\Config;

use Lupcom\Globals\Exceptions\DcaConfigNotSetException;

/**
 * Class Item
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <christian.wederka@lupcom.de>
 * @package Lupcom\Globals\Dca\Config
 */
class Item
{
    /**
     * @var
     */
    private $namespace;
    /**
     * @var
     */
    private $config;

    /**
     * Item constructor.
     * @param $namespace
     * @param false $extend
     * @throws DcaConfigNotSetException
     */
    public function __construct($namespace, $extend = false)
    {
        if (!$extend) {
            $GLOBALS['TL_DCA'][$namespace]['config'] = [];
        }

        if($extend) {
            if(!isset($GLOBALS['TL_DCA'][$namespace]['config'])) {
                throw new DcaConfigNotSetException('The default config to be extended does not exist in the namespace "' . $namespace . '".');
            }
        }

        $this->namespace = $namespace;
        $this->config    = &$GLOBALS['TL_DCA'][$this->namespace]['config'];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function label(string $value): Item
    {
        $this->config['label'] = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function pTable(string $value): Item
    {
        $this->config['ptable'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function dynamicPtable(bool $value = true): Item
    {
        $this->config['dynamicPtable'] = $value;

        return $this;
    }

    /**
     * @param array $tables
     * @return $this
     */
    public function cTable(array $tables): Item
    {
        $this->config['ctable'] = $tables;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function dataContainer(string $value): Item
    {
        $this->config['dataContainer'] = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function markAsCopy(string $value): Item
    {
        $this->config['markAsCopy'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function closed(bool $value = true): Item
    {
        $this->config['closed'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function notEditable(bool $value = true): Item
    {
        $this->config['notEditable'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function notDeletable(bool $value = true): Item
    {
        $this->config['notDeletable'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function notSortable(bool $value = true): Item
    {
        $this->config['notSortable'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function notCopyable(bool $value = true): Item
    {
        $this->config['notCopyable'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function notCreatable(bool $value = true): Item
    {
        $this->config['notCreatable'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function switchToEdit(bool $value = true): Item
    {
        $this->config['switchToEdit'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function enableVersioning(bool $value = true): Item
    {
        $this->config['enableVersioning'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function doNotCopyRecords(bool $value = true): Item
    {
        $this->config['doNotCopyRecords'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function doNotDeleteRecords(bool $value = true): Item
    {
        $this->config['doNotDeleteRecords'] = $value;

        return $this;
    }

    /**
     * @param array $callbacks
     * @return $this
     */
    public function onLoadCallback(array $callbacks): Item
    {
        $this->config['onload_callback'] = $callbacks;

        return $this;
    }

    /**
     * @param array $callbacks
     * @return $this
     */
    public function onSubmitCallback(array $callbacks): Item
    {
        $this->config['onsubmit_callback'] = $callbacks;

        return $this;
    }

    /**
     * @param array $callbacks
     * @return $this
     */
    public function onDeleteCallback(array $callbacks): Item
    {
        $this->config['ondelete_callback'] = $callbacks;

        return $this;
    }

    /**
     * @param array $callbacks
     * @return $this
     */
    public function oncutCallback(array $callbacks): Item
    {
        $this->config['oncut_callback'] = $callbacks;

        return $this;
    }

    /**
     * @param array $callbacks
     * @return $this
     */
    public function onCopyCallback(array $callbacks): Item
    {
        $this->config['oncopy_callback'] = $callbacks;

        return $this;
    }

    /**
     * @param array $callbacks
     * @return $this
     */
    public function onUndoCallback(array $callbacks): Item
    {
        $this->config['onundo_callback'] = $callbacks;

        return $this;
    }

    /**
     * @param array $callbacks
     * @return $this
     */
    public function onVersionCallback(array $callbacks): Item
    {
        $this->config['onversion_callback'] = $callbacks;

        return $this;
    }

    /**
     * @param array $callbacks
     * @return $this
     */
    public function onRestoreCallback(array $callbacks): Item
    {
        $this->config['onrestore_callback'] = $callbacks;

        return $this;
    }

    /**
     * @param array $callbacks
     * @return $this
     */
    public function onRestoreVersionCallback(array $callbacks): Item
    {
        $this->config['onrestore_version_callback'] = $callbacks;

        return $this;
    }

    /**
     * @param array $tableConfig
     * @return $this
     */
    public function sql(array $tableConfig): Item
    {
        $this->config['sql'] = $tableConfig;

        return $this;
    }

    /**
     * @param array $customConfig
     * @return $this
     */
    public function custom(array $customConfig): Item
    {
        array_merge($this->config, $customConfig);

        return $this;
    }
}