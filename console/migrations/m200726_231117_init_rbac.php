<?php

use yii\db\Migration;

/**
 * Class m200726_231117_init_rbac
 */
class m200726_231117_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        // add "enterData" permission
        $enterData = $auth->createPermission('enterData');
        $enterData->description = 'Enter applicant data';
        $auth->add($enterData);

        // add "allocate space" permission
        $allocate = $auth->createPermission('allocate');
        $allocate->description = 'Allocate a space';
        $auth->add($allocate);
        
        // add "viewPost" permission
        $verify = $auth->createPermission('verify');
        $verify->description = 'Verify applicant details';
        $auth->add($verify);
        
        // add "deletePost" permission
        $createUser = $auth->createPermission('createUser');
        $createUser->description = 'Create a new user';
        $auth->add($createUser);
		
		// add "createPost" permission
        $viewActivity = $auth->createPermission('viewActivity');
        $viewActivity->description = 'view my activity and print daily report';
        $auth->add($viewActivity);

        // add "updatePost" permission
        $viewAllActivity = $auth->createPermission('viewAllActivity');
        $viewAllActivity->description = 'view activity for every user and generate a report';
        $auth->add($viewAllActivity);
        
        // add "viewPost" permission
        $allocateSpecial = $auth->createPermission('allocateSpecial');
        $allocateSpecial->description = 'allocate reseved space';
        $auth->add($allocateSpecial);
        
        // add "update" permission
        $update = $auth->createPermission('update');
        $update->description = 'Ability to update applicant records';
        $auth->add($update);
		
		

        // add "author" role and give this role the "createPost" permission
        $dataentry = $auth->createRole('dataentry');
        $auth->add($dataentry);
        $auth->addChild($dataentry, $viewActivity);
        $auth->addChild($dataentry, $enterData);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $verification = $auth->createRole('verification');
        $auth->add($verification);
        $auth->addChild($verification, $verify);
        $auth->addChild($verification, $dataentry);
		
		// add "author" role and give this role the "createPost" permission
        $allocation = $auth->createRole('allocation');
        $auth->add($allocation);
        $auth->addChild($allocation, $allocate);
        $auth->addChild($allocation, $viewAllActivity);
        $auth->addChild($allocation, $verification);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $createUser);
        $auth->addChild($admin, $allocateSpecial);
        $auth->addChild($admin, $update);
        $auth->addChild($admin, $allocation);
		

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($admin, 2);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200726_231117_init_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200726_231117_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
