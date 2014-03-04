<?php

class Task_1
{
    public function __construct()
    {
        $this->checks = array(
            3 => 'Fizz'
            , 5 => 'Buzz'
        );
    }

    public function Task_1_2(array $range)
    {
        $this->checkRange($range);
        $this->setRange($range);
        
        $output = '';

        $strlen = strlen(implode(' ', $this->checks));

        for ($i = $this->min; $i < $this->max + 1; $i++) { 

            $tmp = array();

            foreach ($this->checks as $key => $value) {
                
                if ($i % $key === 0) {
                    $tmp[] = true;
                    $output .= $value.' ';                      
                }

            }

            $result = substr(trim($output), $strlen - $strlen * 2);

            if ($result === implode(' ', $this->checks)
                || $result === implode(' ', array_reverse($this->checks))) {
                $output .= 'Bazz ';
                $i++;
            } elseif (count($tmp) === 0) {
                $output .= $i .' ';
            }

        }

        return trim($output)."\n";
    }

    protected function checkRange(array $range)
    {
        if (count($range) !== 2) {
            throw new Exception('Input range is malformed.');
        }
    }

    protected function setRange(array $range)
    {
        $this->min = min($range);
        $this->max = max($range);
    }

}

$Task_1 = new Task_1();

echo $Task_1->Task_1_2(array(4, 11));
