<?php

namespace Socialog\Collections;

use Closure;

/**
 * Description of ArrayCollection
 *
 * @author rovak
 */
class ArrayCollection extends \Doctrine\Common\Collections\ArrayCollection
{
    /**
     * @param Closure $func
     * @return ArrayCollection
     */
    public function groupBy(Closure $func)
    {
        $result = new static();
        
        foreach ($this->toArray() as $key => $element) {
            $group = $func($element);
            
            if ( ! isset($result[$group])) {
                $result[$group] = new ArrayCollection;
            }

            $result[$group][$key] = $element;
        }
        
        return $result;
    }
}
