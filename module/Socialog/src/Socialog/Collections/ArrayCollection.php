<?php

namespace Socialog\Collections;

use Closure;

class ArrayCollection extends \Doctrine\Common\Collections\ArrayCollection
{

    /**
     * @param Closure $func
     * @return ArrayCollection
     */
    public function groupBy()
    {
        $funcs = func_get_args();
        $func = array_shift($funcs);

        $result = new static();

        if ($func instanceof Closure) {
            foreach ($this->toArray() as $key => $element) {
                $group = (string) $func($element);

                if (!isset($result[$group])) {
                    $result[$group] = new ArrayCollection;
                }

                $result[$group][$key] = $element;
            }
        }

        if (count($funcs) > 0) {
            return $result->map(function($element) use ($funcs) {
                return call_user_func_array(array($element, 'groupBy'), $funcs);
            });
        }

        return $result;
    }

}
