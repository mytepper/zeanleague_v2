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
		$user = $this->Auth->user();
		if ($this->request->is('ajax')) {
			$predict = $this->Predict->getPredictData($teamsCompetitionId, $user);
			if ($predict) {
				$this->request->data = $predict;
			}
			$result = $this->Predict->getPredictDataSubmit($teamsCompetitionId, $user);
			$this->set(compact('result'));
			return $this->render('/Elements/teams_competitions/predict_form');
		}
	}

/**
 * [submit]
 *
 * @return void
 */
	public function submitForm() {
		$user = $this->Auth->user();
		if ($this->request->is('ajax')) {
			$this->request->data['Predict']['member_id'] = $user['member_id'];
			$teamsCompetitionId = $this->request->data['Predict']['teams_competition_id'];
			$saved = $this->Predict->save($this->request->data);
			if ($saved) {
				$this->Flash->success('ทายผลบอลสำเร็จ', array('key' => 'predicts'));
				$predict = $this->Predict->getPredictData($teamsCompetitionId, $user);
				$this->request->data = $predict;
			} else {
				$this->Flash->errors('กรุณากรอกข้อมูลให้ครบ', array('key' => 'predicts'));
			}
			$result = $this->Predict->getPredictDataSubmit($teamsCompetitionId, $user);
			$this->set(compact('result'));
			return $this->render('/Elements/teams_competitions/predict_form');
		}
	}

/**
 * [getPredictsToday]
 *
 * @return void
 */
	public function getPredictsToday() {
		$user = $this->Auth->user();
		if ($this->request->is('ajax')) {
			$predicts = $this->Predict->getMemberPredictsByDate($user['member_id'], date('Y-m-d'));
			$this->set(compact('predicts'));
			$this->render('/Elements/predicts/predict_today_table');
		}
	}

/**
 * [deleted]
 *
 * @return void
 */
	public function deleted() {
		$user = $this->Auth->user();
		if ($this->request->is('ajax')) {
			$status = false;
			$message = 'ไม่สามารถลบข้อมูลได้';
			$deleted = $this->Predict->deletePredict($this->request->data['id'], $user['member_id']);
			if ($deleted) {
				$status = true;
				$message = 'ลบข้อมูลสำเร็จ';
			}
		}
		return $this->setJsonResponse(
			array(
				'status' => $status,
				'message' => $message,
			)
		);
	}
}
