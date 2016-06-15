<?php
App::uses('AppController', 'Controller');
/**
 * Predicts Controller
 */
class PredictsController extends AppController {

	public $components = array('RequestHandler', 'Paginator');

/**
 * [beforeFilter]
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();
	}

/**
 * [getForm]
 *
 * @param int $teamsCompetitionId teamsCompetitionId
 * @return void
 */
	public function getForm($teamsCompetitionId) {
		if ($this->request->is('ajax')) {
			$user = $this->Auth->user();
			//$predict = $this->Predict->getPredictData($teamsCompetitionId, $user);
			$result = $this->Predict->getPredictDataSubmit($teamsCompetitionId, $user);
			$this->set(compact('result'));
			//$this->request->data = $predict;
			return $this->render('/Elements/teams_competitions/predict_form');
		}
	}

/**
 * [submit]
 *
 * @return void
 */
	public function submit() {
	}
}
