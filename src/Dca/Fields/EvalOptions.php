<?php

namespace LumturoNet\Globals\Dca\Fields;

use InvalidArgumentException;
use LumturoNet\Globals\Exceptions\InvalidCallException;

/**
 * Class EvalOptions
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <cw@lumturo.net>
 * @package LumturoNet\Globals\Dca\Options\Fields
 */
class EvalOptions
{
    /**
     * @var
     */
    private $namespace;
    /**
     * @var
     */
    private $field;
    /**
     * @var
     */
    private $fieldObject;
    /**
     * @var array
     */
    private $eval;

    /**
     * EvalOptions constructor.
     * @param $namespace
     * @param $field
     * @param $fieldObject
     */
    public function __construct($namespace, $field, $fieldObject)
    {
        $this->namespace   = $namespace;
        $this->field       = $field;
        $this->fieldObject = $fieldObject;

        $this->eval = [];
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function helpwizard(bool $value = true): EvalOptions
    {
        $this->eval['helpwizard'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function mandatory(bool $value = true): EvalOptions
    {
        $this->eval['mandatory'] = $value;

        return $this;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function maxlength(int $value): EvalOptions
    {
        $this->eval['maxlength'] = $value;

        return $this;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function minlength(int $value): EvalOptions
    {
        $this->eval['minlength'] = $value;

        return $this;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function maxval(int $value): EvalOptions
    {
        $this->eval['maxval'] = $value;

        return $this;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function minval(int $value): EvalOptions
    {
        $this->eval['minval'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function fallback(bool $value = true): EvalOptions
    {
        $this->eval['fallback'] = $value;

        return $this;
    }

    /**
     * @param string $regExp
     * @return $this
     */
    public function rgxp(string $regExp): EvalOptions
    {
        $validRegExp = [
            'digit',
            'natural',
            'alpha',
            'alnum',
            'extnd',
            'date',
            'time',
            'datim',
            'friendly',
            'email',
            'emails',
            'url',
            'alias',
            'folderalias',
            'phone',
            'prcnt',
            'locale',
            'language',
            'google+',
            'fieldname'
        ];

        if (!in_array($regExp, $validRegExp)) {
            throw new InvalidArgumentException('The given "' . $regExp . '" regExp must one of the following values: ' . implode('|',
                    $validRegExp));
        }

        $this->eval['rgxp'] = $regExp;

        return $this;
    }

    /**
     * @param int $value
     * @return $this
     * @throws InvalidCallException
     */
    public function cols(int $value): EvalOptions
    {
        if ($GLOBALS['TL_DCA'][$this->namespace]['fields'][$this->field]['inputType'] != 'textarea') {
            throw new InvalidCallException('The "cols" method can only be used on textarea fields.');
        }

        $this->eval['cols'] = $value;

        return $this;
    }

    /**
     * @param int $value
     * @return $this
     * @throws InvalidCallException
     */
    public function rows(int $value): EvalOptions
    {
        if ($GLOBALS['TL_DCA'][$this->namespace]['fields'][$this->field]['inputType'] != 'textarea') {
            throw new InvalidCallException('The "rows" method can only be used on textarea fields.');
        }

        $this->eval['rows'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     * @throws InvalidCallException
     */
    public function multiple(bool $value = true): EvalOptions
    {
        if (!in_array($GLOBALS['TL_DCA'][$this->namespace]['fields'][$this->field]['inputType'], [
            'text',
            'select',
            'radio',
            'checkbox',
            'checkboxWizard'
        ])) {
            throw new InvalidCallException('The "multiple" method can only be used on text|select|radio|checkbox fields');
        }

        $this->eval['multiple'] = $value;

        return $this;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function size(int $value): EvalOptions
    {
        $this->eval['size'] = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function style(string $value): EvalOptions
    {
        $this->eval['style'] = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function rte(string $value = 'tinyMCE'): EvalOptions
    {
        if (!in_array($value, [
            'ace',
            'tinyMCE'
        ])) {
            throw new InvalidArgumentException('The given value of the "rte" method must be: ace|tinyMCE');
        }

        $this->eval['rte'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function submitOnChange(bool $value = true): EvalOptions
    {
        $this->eval['submitOnChange'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function nospace(bool $value = true): EvalOptions
    {
        $this->eval['nospace'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function allowHtml(bool $value = true): EvalOptions
    {
        $this->eval['allowHtml'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function preserveTags(bool $value = true): EvalOptions
    {
        $this->eval['allowHtml'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function decodeEntities(bool $value = true): EvalOptions
    {
        $this->eval['decodeEntities'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function useRawRequestData(bool $value = true): EvalOptions
    {
        $this->eval['useRawRequestData'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function doNotSaveEmpty(bool $value = true): EvalOptions
    {
        $this->eval['doNotSaveEmpty'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function alwaysSave(bool $value = true): EvalOptions
    {
        $this->eval['alwaysSave'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function spaceToUnderscore(bool $value = true): EvalOptions
    {
        $this->eval['spaceToUnderscore'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function unique(bool $value = true): EvalOptions
    {
        $this->eval['unique'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function encrypt(bool $value = true): EvalOptions
    {
        $this->eval['encrypt'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function trailingSlash(bool $value = true): EvalOptions
    {
        $this->eval['trailingSlash'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     * @throws InvalidCallException
     */
    public function files(bool $value = true): EvalOptions
    {
        if ($GLOBALS['TL_DCA'][$this->namespace]['fields'][$this->field]['inputType'] != 'fileTree') {
            throw new InvalidCallException('The "files" method can only be used on fileTree fields.');
        }

        $this->eval['files'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     * @throws InvalidCallException
     */
    public function filesOnly(bool $value = true): EvalOptions
    {
        if ($GLOBALS['TL_DCA'][$this->namespace]['fields'][$this->field]['inputType'] != 'fileTree') {
            throw new InvalidCallException('The "filesOnly" method can only be used on fileTree fields.');
        }

        $this->eval['filesOnly'] = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     * @throws InvalidCallException
     */
    public function extensions(string $value): EvalOptions
    {
        if ($GLOBALS['TL_DCA'][$this->namespace]['fields'][$this->field]['inputType'] != 'fileTree') {
            throw new InvalidCallException('The "extensions" method can only be used on fileTree fields.');
        }

        $this->eval['extensions'] = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     * @throws InvalidCallException
     */
    public function path(string $value): EvalOptions
    {
        if ($GLOBALS['TL_DCA'][$this->namespace]['fields'][$this->field]['inputType'] != 'fileTree') {
            throw new InvalidCallException('The "path" method can only be used on fileTree fields.');
        }

        $this->eval['path'] = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     * @throws InvalidCallException
     */
    public function fieldType(string $value): EvalOptions
    {
        if (!in_array($GLOBALS['TL_DCA'][$this->namespace]['fields'][$this->field]['inputType'], [
            'fileTree',
            'pageTree'
        ])) {
            throw new InvalidCallException('The "fieldType" method can only be used on: fileTree|pageTree fields.');
        }

        $this->eval['fieldType'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     * @throws InvalidCallException
     */
    public function isSortable(bool $value = true): EvalOptions
    {
        if (floatval(VERSION) < 4.10) {
            throw new BadVersionException('The "isSortable" method can only be applied in Contao 4.10. Your Version: ' . VERSION);
        }

        if ($GLOBALS['TL_DCA'][$this->namespace]['fields'][$this->field]['inputType'] != 'fileTree') {
            throw new InvalidCallException('The "path" method can only be used on fileTree fields.');
        }

        $this->eval['isSortable'] = $value;

        return $this;
    }

    /**
     * @param string $column
     * @return $this
     * @throws InvalidCallException
     */
    public function orderField(string $column): EvalOptions
    {
        if ($GLOBALS['TL_DCA'][$this->namespace]['fields'][$this->field]['inputType'] != 'fileTree') {
            throw new InvalidCallException('The "path" method can only be used on fileTree fields.');
        }

        $this->eval['orderField'] = $column;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     * @throws InvalidCallException
     */
    public function includeBlankOption(bool $value = true): EvalOptions
    {
        if ($GLOBALS['TL_DCA'][$this->namespace]['fields'][$this->field]['inputType'] != 'select') {
            throw new InvalidCallException('The "includeBlankOption" method can only be used on select fields.');
        }

        $this->eval['includeBlankOption'] = $value;

        return $this;
    }

    /**
     * @param string $label
     * @return $this
     * @throws InvalidCallException
     */
    public function blankOptionLabel(string $label): EvalOptions
    {
        if ($GLOBALS['TL_DCA'][$this->namespace]['fields'][$this->field]['inputType'] != 'select') {
            throw new InvalidCallException('The "includeBlankOption" method can only be used on select fields.');
        }

        $this->eval['blankOptionLabel'] = $label;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     * @throws InvalidCallException
     */
    public function chosen(bool $value = true): EvalOptions
    {
        if ($GLOBALS['TL_DCA'][$this->namespace]['fields'][$this->field]['inputType'] != 'select') {
            throw new InvalidCallException('The "includeBlankOption" method can only be used on select fields.');
        }

        $this->eval['chosen'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     * @throws InvalidCallException
     */
    public function findInSet(bool $value = true): EvalOptions
    {
        if ($GLOBALS['TL_DCA'][$this->namespace]['fields'][$this->field]['inputType'] != 'select') {
            throw new InvalidCallException('The "includeBlankOption" method can only be used on select fields.');
        }

        $this->eval['findInSet'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function datepicker(bool $value = true): EvalOptions
    {
        $this->eval['datepicker'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function colorpicker(bool $value = true): EvalOptions
    {
        $this->eval['colorpicker'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function feEditable(bool $value = true): EvalOptions
    {
        $this->eval['feEditable'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function feGroup(bool $value = true): EvalOptions
    {
        $this->eval['feEditable'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function feViewable(bool $value = true): EvalOptions
    {
        $this->eval['feViewable'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function doNotCopy(bool $value = true): EvalOptions
    {
        $this->eval['doNotCopy'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function hideInput(bool $value = true): EvalOptions
    {
        $this->eval['hideInput'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function doNotShow(bool $value = true): EvalOptions
    {
        $this->eval['doNotShow'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function isBoolean(bool $value = true): EvalOptions
    {
        $this->eval['isBoolean'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function isAssociative(bool $value = true): EvalOptions
    {
        $this->eval['isAssociative'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function disabled(bool $value = true): EvalOptions
    {
        $this->eval['disabled'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function readonly(bool $value = true): EvalOptions
    {
        $this->eval['readonly'] = $value;

        return $this;
    }

    /**
     * @param string $delimiter
     * @return $this
     */
    public function csv(string $delimiter): EvalOptions
    {
        $this->eval['csv'] = $delimiter;

        return $this;
    }

    /**
     * @param string $class
     * @return $this
     */
    public function tlClass(string $class): EvalOptions
    {
        $this->eval['tl_class'] = $class;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function dcaPicker(bool $value = true): EvalOptions
    {
        $this->eval['dcaPicker'] = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function placeholder(string $value): EvalOptions
    {
        $this->eval['placeholder'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function isHexColor(bool $value = true): EvalOptions
    {
        $this->eval['isHexColor'] = $value;

        return $this;
    }

    /**
     * @param array $evalOptions
     * @return $this
     */
    public function custom(array $evalOptions): EvalOptions
    {
        $this->eval = array_merge($this->eval, $evalOptions);

        return $this;
    }

    /**
     * @return Item
     */
    public function compile(): Item
    {
        $GLOBALS['TL_DCA'][$this->namespace]['fields'][$this->field]['eval'] = $this->eval;

        return $this->fieldObject;
    }
}