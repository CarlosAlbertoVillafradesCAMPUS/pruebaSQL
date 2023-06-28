<?php
header("Access-Control-Allow-Origin: *");

require_once "../vendor/autoload.php";

$router = new \Bramus\Router\Router();

//region
$router->get("/region", function(){
    echo json_encode(\App\region::getInstance()->regionGet());
});
$router->get("/region/{id}", function($id){
    echo json_encode(\App\region::getInstance()->regionGetId($id));
});
$router->delete("/region/{id}", function($id){
    \App\region::getInstance()->regionDelete($id);
});
$router->post("/region", function(){
   \App\region::getInstance(json_decode(file_get_contents("php://input"),true))->regionPost(); 
});
$router->put("/region/{id}", function($id){
   \App\region::getInstance(json_decode(file_get_contents("php://input"),true))->regionPut($id);
});


//departamento
$router->get("/departamento", function(){
    echo json_encode(\App\departamento::getInstance()->departamentoGet());
});
$router->get("/departamento/{id}", function($id){
    echo json_encode(\App\departamento::getInstance()->departamentoGetId($id));
});
$router->delete("/departamento/{id}", function($id){
    \App\departamento::getInstance()->departamentoDelete($id);
});
$router->post("/departamento", function(){
   \App\departamento::getInstance(json_decode(file_get_contents("php://input"),true))->departamentoPost(); 
});
$router->put("/departamento/{id}", function($id){
   \App\departamento::getInstance(json_decode(file_get_contents("php://input"),true))->departamentoPut($id);
});



//pais
$router->get("/pais", function(){
    echo json_encode(\App\pais::getInstance()->paisGet());
});
$router->get("/pais/{id}", function($id){
    echo json_encode(\App\pais::getInstance()->paisGetId($id));
});
$router->delete("/pais/{id}", function($id){
    \App\pais::getInstance()->paisDelete($id);
});
$router->post("/pais", function(){
   \App\pais::getInstance(json_decode(file_get_contents("php://input"),true))->paisPost(); 
});
$router->put("/pais/{id}", function($id){
   \App\pais::getInstance(json_decode(file_get_contents("php://input"),true))->paisPut($id);
});


//campers
$router->get("/campers", function(){
    echo json_encode(\App\campers::getInstance()->campersGet());
});
$router->get("/campers/{id}", function($id){
    echo json_encode(\App\campers::getInstance()->campersGetId($id));
});
$router->delete("/campers/{id}", function($id){
    \App\campers::getInstance()->campersDelete($id);
});
$router->post("/campers", function(){
   \App\campers::getInstance(json_decode(file_get_contents("php://input"),true))->campersPost(); 
});
$router->put("/campers/{id}", function($id){
   \App\campers::getInstance(json_decode(file_get_contents("php://input"),true))->campersPut($id);
});

$router->run();


/* //CITIES
$router->get("/cities", function(){
    echo json_encode(\App\cities::getInstance()->citiesGet());
});
$router->get("/cities/{id}", function($id){
    echo json_encode(\App\cities::getInstance()->citiesGetId($id));
});
$router->delete("/cities/{id}", function($id){
    \App\cities::getInstance()->citiesDelete($id);
});
$router->post("/cities", function(){
   \App\cities::getInstance(json_decode(file_get_contents("php://input"),true))->citiesPost(); 
});
$router->put("/cities/{id}", function($id){
   \App\cities::getInstance(json_decode(file_get_contents("php://input"),true))->citiesPut($id);
}); */
?>