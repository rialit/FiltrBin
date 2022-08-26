<?php 

namespace FiltrBin\FileMeneger\Values;



interface ValueInterface{

    /**
     *  Get values of position in file
     *  @param  int             $pos        position start. Position is not bit IS BYTE of 4 bit !! this important
     *  @param  string|bool     $fs         recurce file open
     * 
     *  @return mixed   data transform string
     */
    public function getValue( int $pos, string|bool $fs ): mixed;

    /**
     * 
     *  Transform data in binary structs
     * 
     *  @param  mixed    $data       data for transform
     * 
     *  @return string   binary data
     */
    public function setValue( mixed $data ): string;

    /**
     * 
     *  Return length for write data (length NOT count bit's length count byte's)
     * 
     *  @return  int    
     */
    public function length( ): int;

}



?>