<?php
	namespace Controllers;

class Product extends Controller {
    
        public function addform(){
            $view = $this->getView('Product');
			$view->addform();
        }    
        public function add(){
            $model=$this->getModel('Product');
            $data = $model->add($_POST['name'], $_POST['description'], $_POST['price'], $_POST['amount'], $_POST['category']);
            
            $this->redirect('Product');
        }
	}
