<?php

namespace App\Data;

use App\Entity\Category;
use App\Entity\Ville;

class SearchData
{
    /**
     * @var string
     */
     public $q = '';


     /**
     * @var Category[]
     */
     public $category = [];
     

      /**
     * @var Ville[]
     */
    public $ville = [];


    /**
    * @var null|integer
    */
     public $max;


    /**
      * @var null|integer
    */
     public $min;

   
     
}