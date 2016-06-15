<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 */
class EventsController extends AppController {

	public $components = array('RequestHandler', 'Paginator');

/**
 * [index events list]
 *
 * @return void
 */
	public function index() {
		$conditions = array();
		if (isset($this->request->query['key'])) {
			$conditions = array(
				'Event.name LIKE' => '%' . $this->request->query['key'] . '%'
			);
		}
		$this->paginate = array(
			'limit' => 20,
			'conditions' => $conditions,
			'order' => array('id' => 'desc')
		);
		$events = $this->paginate('Event');
		$this->set(compact('events'));
	}

/**
 * [add]
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$saved = $this->Event->save($this->request->data);
			if ($saved) {
				$this->Flash->success('บันทึกข้อมูลแล้ว.', array('key' => 'events'));
				$this->redirect('/events/add');
			} else {
				$this->Flash->errors('ไม่สามารถเพิ่มข้อมูลได้.', array('key' => 'events'));
			}
		}
	}

/**
 * [edit]
 *
 * @param int $id event id
 * @return void
 */
	public function edit($id) {
		$event = $this->Event->findById($id);
		if ($this->request->is('put')) {
			$saved = $this->Event->save($this->request->data);
			if ($saved) {
				$this->Flash->success('อัพเดทข้อมูลแล้ว.', array('key' => 'events'));
				$this->redirect('/events/edit/' . $id);
			} else {
				$this->Flash->errors('อัพเดทข้อมูลไม่ได้.', array('key' => 'events'));
			}
		} else {
			$this->request->data = $event;
		}
	}
}
