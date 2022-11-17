<?php

namespace Route\Mvc\controllers;

use Route\Mvc\core\basecontroller;
use Route\Mvc\models\categoryModel;

class category extends basecontroller{

    // show all category
    public function index(){
         $db=['localhost','root','','crudmvc'];
        $category = new categoryModel($db);
        $data =  $category->getAllCategory();
        $this->view("category/index",['data'=>$data]);
    }

    // view form add
    public function add(){
        
        $this->view("category/add"); 
    }


    // save data to category 
    public function store(){
         $db=['localhost','root','','crudmvc'];
        $category = new categoryModel($db);
        $category->addNewCategory($_POST);
        header("location: index");
    }

    // show category by id 
    public function edit($id){
         $db=['localhost','root','','crudmvc'];
        $category = new categoryModel($db);
        $data = $category->showCategoryById($id);
        $this->view("category/update",['data'=>$data]);
    }

    // save update
    public function update(){

        // print_r($_POST);die;
         $db=['localhost','root','','crudmvc'];
        $category = new categoryModel($db);
        $category->updateCategory(['title'=>$_POST['title']],$_POST['id']);
        header("location: index");
    }


    public function delete($id){

        $db=['localhost','root','','crudmvc'];
        $category = new categoryModel($db);
        if($category->showCategoryById($id)){
            $res =  $category->deleteCategory($id);
            header("location: ../index");
        }else{
            header("location: ../index");
        }

    }


}