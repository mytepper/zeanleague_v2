<?php
App::uses('AppController', 'Controller');
/**
 * Images Controller
 */
class ImagesController extends AppController {


/**
 * [imageThumb description]
 * @method imageThumb
 * @param string $model
 * @param string $field
 * @param string $dir 
 * @param string $imageName file name
 * @return image
 */
	public function imageThumb($model, $field, $dir, $imageName) {
		$fileLocation = 'webroot' . DS . 'files' . DS . $model . DS . $field . DS . $dir . DS . $imageName;
		$this->response->file($fileLocation);
   		return $this->response;
	}

}
