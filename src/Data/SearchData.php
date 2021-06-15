<?php

namespace App\Data;

use App\Entity\Category;
use App\Entity\Ville;
use App\Entity\Departement;

class SearchData
{


     /**
     * @var Category[]
     */
     public $category = [];
     

      /**
     * @var Departement[]
     */
    public $departement = [];

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

    /**
      * @var null|integer
    */
    public $status;

   
     
}