<?php
App::uses('AppModel', 'Model');
/**
 * Admin Model
 *
 */
class Admin extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'admin';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'admin_id';

}
