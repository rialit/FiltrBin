<?php 

namespace FiltrBin\FileMeneger\Space;



interface SpaceInterface{

    /**
     *  return array space (sorting int array)
     * 
     * 
     *  @return array  
     */

    public function getSpace( ): array;


    /**
     *  write space data in file
     *  @param int $pos position for writing
     * 
     *  @return bool    if good return true else false
     */

    public function write(int $pos): bool;

    /**
     *  add int data in abstract data and sorting
     *  
     *  @param array<int>|int    $data   data for add in arr space
     * 
     *  @return bool    if good return true else false
     */

    public function add( array|int $data ): bool;

    /**
     *  found in array Space part int's for write
     *  
     *  @param int    $count   count of found
     * 
     *  @return array    if good return array<int> else return [] 
     */

    public function foundPart( int $count ): array;

    

}



?>