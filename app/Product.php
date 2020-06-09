<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'nombre', 'descripcion', 'precio', 'imagen','categoria', 'formato', 'tipo_animal', 'destacado'
   ];


    /**
     * Return an array of search results
     *
     * @param  string  $name
     * @return Collection
     */
   public static function search_product($name){

        //Selecciona las 10 primeras coincidencias
        $products = Product::where('nombre', 'LIKE', '%' . $name . '%')
                              ->take(10)
                              ->get();

        return $products;

   }


   /**
     * Return an array of filtered products
     *
     * @param  string  $animal
     * @param string categoria
     * @return Collection
     */
   public static function get_products_filtered($animal, $categoria){

        $products = Product::where('tipo_animal', '=', $animal)
                            ->where('categoria', '=', $categoria)
                            ->get();

        return $products;

   }

   public $timestamps = false;

    /**
     * Get the product_orders for a product.
     */
     public function product_orders()
     {
        return $this->hasMany('App\ProductOrder');
     }
}