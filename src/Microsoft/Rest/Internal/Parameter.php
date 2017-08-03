<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Types\TypeAbstract;

/**
 * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#parameterObject
 */
final class Parameter
{
    /**
     * @return bool
     */
    function isConst()
    {
        return $this->isConst;
    }

    /**
     * @return mixed|null
     */
    function getConstValue()
    {
        return $this->constValue;
    }

    function urlEncode($value) {
        return $this->xMsSkipUrlEncoding ? $value : urlencode($value);
    }

    /**
     * @param TypeAbstract[] $typeMap
     * @param array $sharedParameterMap
     * @param DataAbstract $parameterData
     * @return Parameter
     */
    static function createFromData(array $typeMap, array $sharedParameterMap, DataAbstract $parameterData)
    {
        $schemaData = $parameterData->getChildOrNull('schema');

        $type = TypeAbstract::createFromData(
            $typeMap,
            $schemaData !== null ? $schemaData : $parameterData);

        $in = $parameterData->getChildValue('in');

        $required = $parameterData->getChildValueOrNull('required');
        if ($required === null) {
            $required = $in === 'path';
        }

        $xMsSkipUrlEncoding = $parameterData->getChildValueOrNull('x-ms-skip-url-encoding');
        if ($xMsSkipUrlEncoding === null) {
            $xMsSkipUrlEncoding = FALSE;
        }

        return new self(
            $parameterData->getChildValue('name'),
            $in,
            $required,
            $xMsSkipUrlEncoding,
            $type);
    }

    function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    function getIn() {
        return $this->in;
    }

    /**
     * @param string $name
     * @param string $in
     * @param bool $required
     * @param bool $xMsSkipUrlEncoding
     * @param TypeAbstract $type
     */
    function __construct(
        $name,
        $in,
        $required,
        $xMsSkipUrlEncoding,
        TypeAbstract $type)
    {
        $this->name = $name;
        $this->in = $in;
        $this->required = $required;
        $this->xMsSkipUrlEncoding = $xMsSkipUrlEncoding;
        $this->type = $type;
        $this->isConst = $type->isConst() && $required;
        if ($this->isConst) {
            $this->constValue = $type->getConstValue();
        }
    }

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $in;

    /**
     * @var bool
     */
    private $required;

    /**
     * @var bool
     */
    private $xMsSkipUrlEncoding;

    /**
     * @var TypeAbstract
     */
    private $type;

    /**
     * @var bool
     */
    private $isConst;

    /**
     * @var mixed|null
     */
    private $constValue;
}