<?php 

namespace FiltrBin\FileMeneger\Values;



class ArrayInt implements ValueInterface {

    protected $_length = 0; 

    /**
     *  @inheritDoc
     */
    public function getValue( int $pos, $fs ): mixed{

        if( ($fs === false ) || !is_resource($fs)){
            throw new \InvalidArgumentException("Wrong value format for ArrayInt. Expected recurce file");
        }

        fseek($fs, $pos*4);

        $length = fread($fs, 4);
        $length = unpack("Ilen", $length)["len"];

        $data = fread($fs, $length*4);
        $data = unpack("I*", $data);

        $data = array_values($data);

        return $data;

    }

    /**
     *  @inheritDoc
     */
    public function setValue( mixed $data ): string{

        /**
         * @var array<int>|<int> $data
         */

        if(is_int($data)){
            $data = [$data];
        }

        if(!is_array($data)){
            throw new \InvalidArgumentException("Wrong value format for ArrayInt. Expected array of int or int");
        }

        $length = count($data);

        $resStr = pack("I", $length);

        $this->_length = $length+1;

        $resStr .= pack("I*", ...$data);

        return $resStr;
    }

    /**
     *  @inheritDoc
     */
    public function length( ): int{

        return $this->_length;

    }

}



?>