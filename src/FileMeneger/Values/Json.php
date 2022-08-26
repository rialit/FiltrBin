<?php 

namespace FiltrBin\FileMeneger\Values;



class Json extends Str {

    /**
     *  @inheritDoc
     */
    public function getValue( int $pos, $fs ): mixed{

        $data = parent::getValue($pos, $fs);

        $data = json_decode($data, true);

        return $data;

    }

    /**
     *  @inheritDoc
     */
    public function setValue( mixed $data ): string{

        $strData = json_encode($data);

        return parent::setValue($strData);

    }

}



?>