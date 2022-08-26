<?php 

namespace FiltrBin\FileMeneger;



interface FileInterface{

    /**     GETER METHODS  */

    /**
     *  return data of file on pos in $pos
     * 
     *  @param  int     $pos    Position start data
     * 
     *  @return int   data
     */

    public function getInt( int $pos): int;

    /**
     *  return data of file on pos in $pos
     * 
     *  @param  int     $pos    Position start data
     * 
     *  @return array   data
     */

    public function getArrInt( int $pos): array;

     /**
     *  return data of file on pos in $pos
     * 
     *  @param  int     $pos    Position start data
     * 
     *  @return string   data
     */

    public function getStr( int $pos): string;

    /**
     *  return data of file on pos in $pos
     * 
     *  @param  int     $pos    Position start data
     * 
     *  @return string   data
     */

    public function getJson( int $pos): string;


    /**     SAVE METHODS  */


    /**
     *  write data in file If data not, create data
     *  @param  int     $data   New data for write 
     * 
     *  @return int  
     */

    public function saveInt( int $data): int;

    /**
     *  write data in file If data not, create data
     *  @param  string  $data   New data for write 
     * 
     *  @return int   
     */

    public function saveStr( string $data): int;

    /**
     *  write data in file If data not, create data
     *  @param  string  $data   New data for write 
     * 
     *  @return int   
     */

    public function saveJson( string $data): int;

    /**
     *  write data in file If data not, create data
     *  @param  string  $data   New data for write 
     * 
     *  @return int   
     */

    public function saveArrInt( array $data): int;



}



?>