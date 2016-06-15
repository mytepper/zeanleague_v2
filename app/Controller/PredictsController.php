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
			$result = array();
			$this->set(compact('result'));
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
