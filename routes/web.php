<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

//SQL
Route::get('/TestSQL', 'TestSQL@verDatos');

//SQL
Route::get('/testController1', 'testController1@verDatos');
Route::get('/servicioController', 'servicioController@verDatos');
//
Route::get('/empresaController/{id}', 'empresaController@verDatos');

Route::get('/empresaController2', 'empresaController@verDatos2');
//
Route::post('/dataEmpresaController', 'dataEmpresaController@actualizaDatos');
//
Route::get('/girosUnicosEmpresa/{id}', 'girosUnicosEmpresa@verDatos');
Route::post('/girosUnicosEmpresa', 'girosUnicosEmpresa@remueveDatos');
//
Route::get('/consultaController/{id}', 'consultaController@verDatos');

Route::post('/consultaController', 'consultaController@addConsulta');

Route::post('/consultaController2', 'consultaController@addConsulta2');
Route::post('/consultaController/testArray', 'consultaController@testArray');
//
Route::get('/dataEmpresaController', 'dataEmpresaController@verDatos');

Route::post('/dataEmpresaController/addProductoEmpresa', 'dataEmpresaController@addProductoEmpresa');
Route::get('/dataEmpresaController/verProductosEmpresa/{id}', 'dataEmpresaController@verProductosEmpresa');
Route::post('/dataEmpresaController/removeProductoEmpresa', 'dataEmpresaController@removeProductoEmpresa');
//

Route::get('/dataEmpresaController/contarEmpresas', 'dataEmpresaController@contarEmpresas');
//
Route::get('/giroController', 'giroController@verDatos');

Route::post('/giroController', 'giroController@addGiroEmpresa');
//
Route::get('/giroEmpresaController', 'giroEmpresaController@verDatos');
Route::get('/areaGiroController', 'areaGiroController@verDatos');

Route::get('/authController/{user}', 'authController@confirmaUsuario');
Route::post('/authController', 'authController@addUser');

Route::get('/fetchData', 'fetchData@verDatos');
Route::get('/fetchData/verProductos', 'fetchData@verProductos');

//

Route::get('/estadoConsultaController/{id}', 'estadoConsultaController@verDatos');
//
Route::get('/masConsultadasController/{id}', 'masConsultadasController@verDatos');
Route::get('/hanConsultadoController/{id}', 'hanConsultadoController@verDatos');

Route::get('/estadoConsultaNegocioController/{id}', 'estadoConsultaNegocioController@addNegocio');

Route::get('/estadoNegocioController/{id}', 'estadoNegocioController@verDatos');

Route::get('/fetchDataConsultaController/{id}', 'fetchDataConsultaController@verDatos');

//
Route::get('/adminHanConsultadoController', 'adminHanConsultadoController@verDatos');
Route::get('/adminUsoDePlataformaController', 'adminUsoDePlataformaController@verDatos');

Route::get('/adminUsoDePlataformaController/contarDatos', 'adminUsoDePlataformaController@contarDatos');

Route::get('/adminUsoDePlataformaController/contarProductos', 'adminUsoDePlataformaController@contarProductos');

Route::get('/adminHanSidoConsultadasController', 'adminHanSidoConsultadasController@verDatos');
Route::get('/adminMasHanConcretadoContactoController', 'adminMasHanConcretadoContactoController@verDatos');

Route::get('/fetchProductos', 'fetchProductos@verDatos');

//Route::get('servicioController/{id}', 'servicioController@verServicios');
