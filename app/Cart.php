<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// references = https://www.youtube.com/watch?v=4J939dDUH4M&list=PL55RiY5tL51qUXDyBqx0mKVOhLNFwwxvH&index=9

class Cart 
{
    public $items=null;
    public $totalQty =0;
    public $totalPrice =0;

    public function __construct ($oldCart){
        if ($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add ($item, $id){
        $storedItem = ['qty'=>0, 'prices' => $item->price, 'item' => $item];
        if ($this->items){
            //cek di cart udh ada barang belum
            if(array_key_exists($id, $this->items)){
                //kalau di cart ada barang dan misalkan kita masukin hapeX tapi hapeX udah ada di cart, jd gaakan terjadi apa apa
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price']= $item->price *$storedItem['qty'];

        //kalau blm ada itemnya di cart disimpen lah si item itu, nambahin ke array
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;

    }

    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset ($this->items[$id]);
    }

    public function updateqty($item, $id, $qty){

        $TempItem = ['qty'=>$qty, 'prices' => $item->price, 'item' => $item];
        $TempItem['qty'] =  $qty ;
        $TempItem['price']= $item->price *$storedItem['qty'];

        $this->totalPrice -= $this->items[$id]['price'];
        $this->totalPrice+= $TempItem['price'];
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalQty+= $TempItem['qty'];

        set ($this->items[$id]);
        
      
     
     
    }

    public function updateitem($query, $id){

      

        $this->totalQty-=$this->items[$id]['qty'];
        $this->totalPrice-=$this->items[$id]['price'];
        $this->items[$id]['qty']= $query;
        $this->items[$id]['price'] = $this->items[$id]['price']*$query;
        $this->totalQty+=$query;
        $this->totalPrice+=$this->items[$id]['price'] ;
       
  
    }

}
