<?php

namespace application\controllers;

//use application\models\Admin;
use application\core\Controller;
use application\lib\ImageUpload;
use application\models\Banner;
use application\lib\SimpleImage;

class BannersController extends Controller {

    public function __construct($route) {
        parent::__construct($route);
        $this->view->layout = 'admin';
    }

    public function indexAction() {
        $bannerModel = new Banner();
        $banners = $bannerModel->getList();
        $this->view->render('indexBanner', ['banners' => $banners]);
    }

    public function editAction()
    {
        $id = $this->route['id'];
        $banner = new Banner();
        $banner = $banner->getById($id);
        $this->view->render('Edit banner', ['banner' => $banner]);

    }

    public function addAction() {
        $this->view->render('Add a New Banner Form');


    }
    public function createAction(){

        $errors = [];
        if(isset($_POST['title']) && (trim($_POST['title']) != '')){
            $title = $_POST['title'];
        }else{
            $errors[] = 'Please give a title';
        }
        if(isset($_POST['position']) && (trim($_POST['position']) != '')){
            $position = $_POST['position'];
        }else{
            $errors[] = 'Please give a position';
        }
        if(isset($_POST['url']) && (trim($_POST['url']) != '')){
            $url = $_POST['url'];
        }else{
            $errors[] = 'Please give a url';
        }

        if(count($errors)){
            $_SESSION['error'] = 'Please give fields';
            $this->view->redirect('admin/banners/add');
        }


        $bannerModel = new Banner();
        $positionExist = $bannerModel->checkPosition($position);

        if($positionExist){
            $_SESSION['error'] = 'This position exist in DB';
            $this->view->redirect('admin/banners/add');
        }

        $status = 0;
        if (isset($_POST['status'])){
            $status = 1;
        }

        $uploader = new ImageUpload();
        $result = $uploader->upload($_FILES['image'], 'public/images/banners/');

        if($result){
            $result = $bannerModel->create($title, $position, $url, $status, $uploader->fileFullPath);
            $this->view->redirect('admin/banners');
        }
        else{
            $_SESSION['error'] = 'File doesn\'t upload';
            $this->view->redirect('admin/banners/add');
        }

    }

    public function deleteAction() {
        $bannerId = $_POST['bannerId'];
        $bannerModel = new Banner();
        $bannerModel->delete($bannerId);
        $this->view->redirect('admin/banners');
    }
    public function updateAction(){

        $errors = [];
        if(isset($_POST['title']) && (trim($_POST['title']) != '')){
            $title = $_POST['title'];
        }else{
            $errors[] = 'Please give a title';
        }
        if(isset($_POST['position']) && (trim($_POST['position']) != '')){
            $position = $_POST['position'];
        }else{
            $errors[] = 'Please give a position';
        }
        if(isset($_POST['url']) && (trim($_POST['url']) != '')){
            $url = $_POST['url'];
        }else{
            $errors[] = 'Please give a url';
        }

        if(count($errors)){
            $_SESSION['error'] = 'Please give fields';
            $this->view->redirect('admin/banners/add');
        }

        $id = $this->route['id'];


        $bannerModel = new Banner();
        $positionExist = $bannerModel->checkPosition($position);

        if($positionExist){
            $_SESSION['error'] = $position . ' position exist in DB';
            $this->view->redirect('admin/banners/edit');
        }

        $status = 0;
        if (isset($_POST['status'])){
            $status = 1;
        }

        if(isset($_FILES['image']['tmp_name'])){
            $uploader = new ImageUpload();
            $uploader->upload($_FILES['image'], 'public/images/banners/');
            $fileName = $uploader->fileFullPath;
        }else{
            $fileName = $_POST['old_image'];
        }

        $result = $bannerModel->update([
            'title' => $title,
            'position' => $position,
            'url' => $url,
            'status' => $status,
            'image' => $fileName,
            'id' => $id
        ]);

        $this->view->redirect('admin/banners');
    }

    public function positionDownAction(){
        $id = $this->route['id'];
        $banner = new Banner();

        $currentBanner = $banner->getById($id);
        $nextBanner = $banner->getDown($currentBanner['position']);
        if($nextBanner){
            $banner->reversePosition($currentBanner, $nextBanner);
        }else{
            $_SESSION['error'] = "Error";
        }

        $this->view->redirect('admin/banners');

    }

    public function positionUpAction(){
        $id = $this->route['id'];
    }
}

