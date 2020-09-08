<?php

namespace Lupcom\Globals\Dca\Fields;

use InvalidArgumentException;
use Lupcom\Globals\Exceptions\DcaFieldExistsException;
use Lupcom\Globals\Exceptions\DcaFieldNotSetException;
use Lupcom\Globals\Exceptions\DcaFieldSqlException;

/**
 * Class Fields
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <christian.wederka@lupcom.de>
 * @package Lupcom\Globals\Dca\Options
 */
class Item
{
    /**
     * @var string
     */
    private $namespace;
    /**
     * @var string
     */
    private $fieldName;
    /**
     * @var
     */
    private $field;

    /**
     * Item constructor.
     * @param string $namespace
     * @param string $field
     * @param bool $extend
     * @throws DcaFieldExistsException
     * @throws DcaFieldNotSetException
     */
    public function __construct(string $namespace, string $field, bool $extend = false)
    {
        if(!$extend) {
            if (isset($GLOBALS['TL_DCA'][$namespace]['fields'][$field])) {
                throw new DcaFieldExistsException('Field "' . $field . '" already exists in the namespace "' . $namespace . '".');
            }

            $GLOBALS['TL_DCA'][$namespace]['fields'][$field] = [];
        }

        if($extend) {
            if(!isset($GLOBALS['TL_DCA'][$namespace]['fields'][$field])) {
                throw new DcaFieldNotSetException('The field "' . $field . '" to be extended does not exist in the namespace "' . $namespace . '".');
            }
        }

        $this->namespace = $namespace;
        $this->fieldName = $field;
        $this->field     = &$GLOBALS['TL_DCA'][$namespace]['fields'][$field];
    }

    /**
     * @param string $label
     * @return $this
     */
    public function label($label): Item
    {
        $label = $GLOBALS['TL_LANG'][$this->namespace][$this->fieldName] ?? $label;

        $this->field['label'] = $label;

        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function default($value): Item
    {
        $this->field['default'] = $value;

        return $this;
    }

    /**
     * @param bool $exclude
     * @return $this
     */
    public function exclude(bool $exclude): Item
    {
        $this->field['exclude'] = $exclude;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function search(bool $value): Item
    {
        $this->field['search'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function sorting(bool $value): Item
    {
        $this->field['sorting'] = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function filter(bool $value): Item
    {
        $this->field['filter'] = $value;

        return $this;
    }

    /**
     * @param int $sortMode
     * @return $this
     */
    public function flag(int $sortMode): Item
    {
        $this->field['flag'] = $sortMode;

        return $this;
    }

    /**
     * @param int $length
     * @return $this
     */
    public function length(int $length): Item
    {
        $this->field['length'] = $length;

        return $this;
    }

    /**
     * @return $this
     */
    public function checkbox(): Item
    {
        $this->field['inputType'] = 'checkbox';

        return $this;
    }

    /**
     * @return $this
     */
    public function checkboxWizard(): Item
    {
        $this->field['inputType'] = 'checkboxWizard';

        return $this;
    }

    /**
     * @return $this
     */
    public function chmod(): Item
    {
        $this->field['inputType'] = 'chmod';

        return $this;
    }

    /**
     * @return $this
     */
    public function fileTree(): Item
    {
        $this->field['inputType'] = 'fileTree';

        return $this;
    }

    /**
     * @return $this
     */
    public function imageSize(): Item
    {
        $this->field['inputType'] = 'imageSize';

        return $this;
    }

    /**
     * @return $this
     */
    public function inputUnit(): Item
    {
        $this->field['inputType'] = 'inputUnit';

        return $this;
    }

    /**
     * @return $this
     */
    public function keyValueWizard(): Item
    {
        $this->field['inputType'] = 'keyValueWizard';

        return $this;
    }

    /**
     * @return $this
     */
    public function listWizard(): Item
    {
        $this->field['inputType'] = 'listWizard';

        return $this;
    }

    /**
     * @return $this
     */
    public function metaWizard(): Item
    {
        $this->field['inputType'] = 'metaWizard';

        return $this;
    }

    /**
     * @return $this
     */
    public function moduleWizard(): Item
    {
        $this->field['inputType'] = 'moduleWizard';

        return $this;
    }

    /**
     * @return $this
     */
    public function optionWizard(): Item
    {
        $this->field['inputType'] = 'optionWizard';

        return $this;
    }

    /**
     * @return $this
     */
    public function pageTree(): Item
    {
        $this->field['inputType'] = 'pageTree';

        return $this;
    }

    /**
     * @return $this
     */
    public function password(): Item
    {
        $this->field['inputType'] = 'password';

        return $this;
    }

    /**
     * @return $this
     */
    public function picker(): Item
    {
        $this->field['inputType'] = 'picker';

        return $this;
    }

    /**
     * @return $this
     */
    public function radio(): Item
    {
        $this->field['inputType'] = 'radio';

        return $this;
    }

    /**
     * @return $this
     */
    public function radioTable(): Item
    {
        $this->field['inputType'] = 'radioTable';

        return $this;
    }

    /**
     * @return $this
     */
    public function sectionWizard(): Item
    {
        $this->field['inputType'] = 'sectionWizard';

        return $this;
    }

    /**
     * @return $this
     */
    public function select(): Item
    {
        $this->field['inputType'] = 'select';

        return $this;
    }

    /**
     * @return $this
     */
    public function serpPreview(): Item
    {
        $this->field['inputType'] = 'serpPreview';

        return $this;
    }

    /**
     * @return $this
     */
    public function tableWizard(): Item
    {
        $this->field['inputType'] = 'tableWizard';

        return $this;
    }

    /**
     * @return $this
     */
    public function text(): Item
    {
        $this->field['inputType'] = 'text';

        return $this;
    }

    /**
     * @return $this
     */
    public function textStore(): Item
    {
        $this->field['inputType'] = 'textStore';

        return $this;
    }

    /**
     * @return $this
     */
    public function textarea(): Item
    {
        $this->field['inputType'] = 'textarea';

        return $this;
    }

    /**
     * @return $this
     */
    public function timePeriod(): Item
    {
        $this->field['inputType'] = 'timePeriod';

        return $this;
    }

    /**
     * @return $this
     */
    public function trbl(): Item
    {
        $this->field['inputType'] = 'trbl';

        return $this;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function options(array $options): Item
    {
        $this->field['options'] = $options;

        return $this;
    }

    /**
     * @param array $optionsCallback
     * @return $this
     */
    public function optionsCallback(array $optionsCallback): Item
    {
        $this->field['options_callback'] = $optionsCallback;

        return $this;
    }

    /**
     * @param string $foreignKey
     * @return $this
     */
    public function foreignKey(string $foreignKey): Item
    {
        $this->field['foreignKey'] = $foreignKey;

        return $this;
    }

    /**
     * @param array $optionsLabels
     * @return $this
     */
    public function reference(array $optionsLabels): Item
    {
        $this->field['reference'] = $optionsLabels;

        return $this;
    }

    /**
     * @param array $explanations
     * @return $this
     */
    public function explanation(array $explanations): Item
    {
        $this->field['explanation'] = $explanations;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function inputFieldCallback(array $callback): Item
    {
        $this->field['input_field_callback'] = $callback;

        return $this;
    }

    /**
     * @return EvalOptions
     */
    public function eval(): EvalOptions
    {
        return new EvalOptions($this->namespace, $this->fieldName, $this);
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function wizard(array $callback): Item
    {
        $this->field['wizard'] = $callback;

        return $this;
    }

    /**
     * @param $value
     * @return $this
     * @throws DcaFieldSqlException
     */
    public function sql($value): Item
    {
        if (!is_array($value) && !is_string($value)) {
            throw new DcaFieldSqlException('The SQL value for the field "' . $this->fieldName . '" in the namespace "' . $this->namespace . '" must be type of: String|Array');
        }

        $this->field['sql'] = $value;

        return $this;
    }

    /**
     * @param array $relations
     * @return $this
     */
    public function relation(array $relations): Item
    {
        $validRelationsTypes = [
            'hasOne',
            'hasMany',
            'belongsTo',
            'belongsToMany'
        ];

        $validLoadTypes = [
            'lazy',
            'eager'
        ];

        foreach($relations as $relation) {
            foreach($relation as $type => $load) {
                if(!in_array($type, $validRelationsTypes)) {
                    throw new InvalidArgumentException('The given relation type must one of the following: ' . implode('|', $validRelationsTypes));
                }

                if(!in_array($load, $validLoadTypes)) {
                    throw new InvalidArgumentException('The given relation load type must one of the following: ' . implode('|', $validLoadTypes));
                }

                $this->field['relation'] = [
                    'type' => $relation[0],
                    'load' => $relation[1]
                ];
            }
        }

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function loadCallback(array $callback): Item
    {
        $this->field['load_callback'] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function saveCallback(array $callback): Item
    {
        $this->field['save_callback'] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function xLabel(array $callback): Item
    {
        $this->field['xlabel'] = $callback;

        return $this;
    }

    /**
     * @param $type
     * @return $this
     */
    public function type($type): Item
    {
        $this->field['inputType'] = $type;

        return $this;
    }

    /**
     * @param array $custom
     * @return $this
     */
    public function custom(array $custom)
    {
        foreach($custom as $key => $value) {
            $this->field[$key] = $value;
        }

        return $this;
    }
}