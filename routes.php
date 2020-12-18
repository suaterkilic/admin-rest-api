

<?php

/**
 * Admin services
 */
Route::post('/admin/login', 'AdminController@adminLogin');
Route::post('/admin/create/user', 'AdminController@store');
Route::post('/admin/user/picture/update', 'AdminController@pictureUpdate');
Route::post('/admin/user/list/get', 'AdminController@fetch');
Route::post('/admin/user/id', 'AdminController@getAdmin');
Route::post('/admin/user/delete', 'AdminController@remove');
Route::post('/admin/user/update', 'AdminController@put');

/**
 * Main Category Services
 */

 Route::post('/category/main/create', 'CategoryController@mainStore');
 Route::post('/category/main/list', 'CategoryController@mainList');
 Route::post('/category/main/id', 'CategoryController@getMain');
 Route::post('/category/main/delete', 'CategoryController@remove');
 Route::post('/category/main/update', 'CategoryController@mainPut');
 Route::post('/category/main/picture/update', 'CategoryController@mainPicturePut');

 /**
  * Sub Category Services
  */

  Route::post('/category/sub/get', 'CategoryController@subGet');
  Route::post('/category/sub/get/sub','CategoryController@subGetSub');
  Route::post('/category/sub/create', 'CategoryController@subStore');
  Route::post('/category/sub/info', 'CategoryController@subInfo');
  Route::post('/category/sub/where', 'CategoryController@subWhere');

  /**
   * Category Destroy
   * */

  Route::post('/category/sub/destroy', 'CategoryController@destroy');
  Route::post('/category/sub/sub/destroy', 'CategoryController@subDestroy');

  /**
   * Sub Category Put
   */

  Route::post('/category/sub/put', 'CategoryController@subPut');

  /**
   * SubSub Category
   */

   Route::post('/category/sub/sub/where', 'CategoryController@subSubWhere');
   Route::post('/category/sub/sub/put', 'CategoryController@subSubPut');

   /**
    * Variations Group
    */

   Route::post('/variations/group/get', 'VariationsController@groupGet');
   Route::post('/variations/where', 'VariationsController@where');

   /**
    * Product
    */

   Route::post('/product/create', 'ProductController@store');
   Route::post('/product/cover/put', 'ProductController@coverPut');
   Route::post('/product/images/create', 'ProductController@storeImageList');
   Route::post('/product/list/sub', 'ProductController@fetchWhereList');
   Route::post('/product/destroy', 'ProductController@destroy');
   Route::post('/product/where', 'ProductController@fetchWhere');
   Route::post('/product/images/list/destroy', 'ProductController@imageListDestroy');
   Route::post('/product/edit/put', 'ProductController@productPut');

   /**
    * Visual
    * Slider
    */

   Route::post('/visual/slider/create', 'SliderController@store');
   Route::post('/visual/slider/image/put', 'SliderController@imagePut');
   Route::post('/visual/slider/all', 'SliderController@all');
   Route::post('/visual/slider/destroy', 'SliderController@destroy');
   Route::post('/visual/slider/edit', 'SliderController@sliderPut');
   Route::post('/visual/slider/where', 'SliderController@where');

   /**
    * Corporate
    */
   Route::post('/corporate/about', 'CorporateController@getAbout');
   Route::post('/corporate/about/put', 'CorporateController@putAbout');
   Route::post('/corporate/order/info', 'CorporateController@getOrderInfo');
   Route::post('/corporate/order/info/put', 'CorporateController@putOrderInfo');
   Route::post('/corporate/contact', 'CorporateController@getContact');

   Route::post('/corporate/contact/put', 'CorporateController@putContact');


   /**
    * CLIENT SIDE
    */

   Route::post('/menu/categories/get', 'CategoryController@allMenu');

   /**
    * Slider
    */
  
   Route::post('/home/slider/fetch', 'HomeController@sliderFetch');
   Route::post('/home/categories/all/fetch', 'HomeController@categoriesAllFetch');