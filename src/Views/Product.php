<?php
	namespace Views;
	
	class Product extends View {      
        public function addform(){
            $categoriesModel = $this->getModel('Category');
            $categories = $categoriesModel->getAllForSelect();
            $this->set('categories', $categories);             
            $this->set('customScript', array('jquery.validate.min', 'ProductAddForm'));
			$this->render('NewProduct');
        }
	}