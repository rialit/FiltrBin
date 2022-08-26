<?php 

namespace FiltrBin\FileMeneger\Values;



class Str implements ValueInterface {

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

        $data = fread($fs, $length);
        $data = unpack("A*", $data)[1];

        return $data;

    }

    /**
     *  @inheritDoc
     */
    public function setValue( mixed $data ): string{

        /**
         * @var mixed $data
        */

        $lengthStr = strlen ($data);

        $resStr = pack("I", $lengthStr);
        
        $resStr .= pack("A*", $data);

        $this->_length = ($lengthStr/4)+1;

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