<?php 

namespace FiltrBin\FileMeneger\Values;



class Num implements ValueInterface {

    protected $_length = 0; 

    /**
     *  @inheritDoc
     */
    public function getValue( int $pos, $fs ): mixed{

        if( ($fs === false ) || !is_resource($fs)){
            throw new \InvalidArgumentException("Wrong value format for ArrayInt. Expected recurce file");
        }

        fseek($fs, $pos*4);

        $data = fread($fs, 4);
        $data = unpack("I", $data)[1];


        return $data;

    }

    /**
     *  @inheritDoc
     */
    public function setValue( mixed $data ): string{

        /**
         * @var int $data
        */

        if(!is_int($data)){
            throw new \InvalidArgumentException("Wrong value format for ArrayInt. Expected integer");
        }

        $resStr = pack("I", $data);

        $this->_length = 1;

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