<?php 

namespace FiltrBin\FileMeneger;

use FiltrBin\FileMeneger\Space\SpaceInterface;

class SpaceMeneger implements SpaceInterface{

    protected $_space = [];

    /**
     *  @inheritDoc
     */
    public function getSpace( ):array{
        return $this->_space;
    }

    /**
     *  @inheritDoc
     */
    public function write(int $pos):bool{

        return true;
    }

    /**
     *  @inheritDoc
     */
    public function add( array|int $data ):bool{

        if(is_int($data)){
            $data = [$data];
        }

        foreach ($data as $item) {
            $this->_space[] = $item;
        }

        sort($this->_space);

        return true;
    }

    /**
     *  @inheritDoc
     */
    public function del( array|int $data ):bool{

        if(is_int($data)){
            $data = [$data];
        }

        $this->_space = array_diff($this->_space, $data);

        return true;
    }

    /**
     *  @inheritDoc
     */
    public function foundPart( int $count ):array{

        $fInSpace = $this->fInArr($this->_space, $count);

        if($fInSpace){

            return $fInSpace;
 
        } else return [];

    }

    /**
     *  found array of spaceIn
     */
    protected function fInArr( array $arr, int $count ):array|bool{

        $part = [];
        $old = false;

        foreach ($arr as $item) {
            
            if(!$old){
                $old = $item;
                $part = [$old];
                continue;
            }

            if(($item - $old) === 1){
                $part[] = $item;
                if(count($part) == $count){
                    break;
                }
            } else {
                $part = [$item];
            }

            $old = $item;

        }

        if(count($part) == $count){

            return $part;

        } else {
            return false;
        }

    }

}



?>