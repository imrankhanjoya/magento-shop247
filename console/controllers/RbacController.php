<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
	public function actionInit()
	{
		$auth = Yii::$app->authManager;

		$auth->removeAll();

		// add "createPost" permission
		$manageDB = $auth->createPermission('manageDB');
		$manageDB->description = 'Manage DB';
		$auth->add($manageDB);

		// add "createPost" permission
		$createOrder = $auth->createPermission('createOrder');
		$createOrder->description = 'Create a order';
		$auth->add($createOrder);

		// add "updatePost" permission
		$updatePost = $auth->createPermission('updateOrder');
		$updatePost->description = 'Update Order';
		$auth->add($updatePost);

		// add "updateMyPost" permission
		$updateMyOrder = $auth->createPermission('updateMyOrder');
		$updateMyOrder->description = 'Update my Order';
		$auth->add($updateMyOrder);

		// add "viewMyOrder" permission
		$viewMyOrder = $auth->createPermission('viewMyOrder');
		$viewMyOrder->description = 'view my Order';
		$auth->add($viewMyOrder);

		// add "updateOrderStatus" permission
		$updatePost = $auth->createPermission('updateOrderStatus');
		$updatePost->description = 'Update Order Status';
		$auth->add($updatePost);


		// add "author" role and give this role the "createPost" permission
		$customer = $auth->createRole('customer');
		$auth->add($customer);
		$auth->addChild($customer, $createOrder);
		$auth->addChild($customer, $viewMyOrder);
		$auth->addChild($customer, $updateMyOrder);

		// add "admin" role and give this role the "updatePost" permission
		// as well as the permissions of the "author" role
		$admin = $auth->createRole('admin');
		$auth->add($admin);
		$auth->addChild($admin, $manageDB);
		$auth->addChild($admin, $updatePost);
		$auth->addChild($admin, $customer);

		// Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
		// usually implemented in your User model.
		$auth->assign($customer, 2);
		$auth->assign($admin, 1);
		$auth->assign($customer, 3);
	}
}
