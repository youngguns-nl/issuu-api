<?php
namespace YoungGuns\StdLib;

/**
 * Description of PropertyAccessor
 *
 * @author otterdijk
 */
abstract class PropertyAccessor
{
    /**
     *
     * @param type $property
     *
     * @return type
     * @throws \InvalidArgumentException
     */
    public function __get($property)
    {
        $lowercaseProperty = lcfirst($property);
        $method = sprintf('get%s', ucfirst($lowercaseProperty));

        if (method_exists($this, $method)) {
            return $this->$method();
        } elseif (property_exists($this, $lowercaseProperty)) {
            return $this->$lowercaseProperty;
        } else {
            throw new \InvalidArgumentException(
                sprintf('%s doesn\'t have a property called "%s"', get_class($this), $property));
        }
    }

    /**
     *
     * @param type $property
     * @param type $value
     *
     * @throws \InvalidArgumentException
     */
    public function __set($property, $value)
    {
        $lowercaseProperty = lcfirst($property);
        $method = sprintf('set%s', ucfirst($lowercaseProperty));

        if (method_exists($this, $method)) {
            $this->$method($value);
        } elseif (property_exists($this, $lowercaseProperty)) {
            $this->$lowercaseProperty = $value;
        } else {
            throw new \InvalidArgumentException(
                sprintf('%s doesn\'t have a property called "%s"', get_class($this), $property));
        }
    }

    /**
     * Returns an array representation of this object
     *
     * @param array $filter
     *
     * @return array
     */
    public function toArray(array $filter = array())
    {
        $filter = array_flip($filter);
        $hasFilter = count($filter) > 0;
        $values = array();
        foreach ($this as $key => $value) {
            if (!$hasFilter || isset($filter[$key])) {
                $values[$key] = $value;
            }
        }

        return $values;
    }
}
