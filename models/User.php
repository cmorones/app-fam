<?php

/*****************************************************************************************
 * EduSec  Open Source Edition is a School / College management system developed by
 * RUDRA SOFTECH. Copyright (C) 2010-2015 RUDRA SOFTECH.

 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see http://www.gnu.org/licenses. 

 * You can contact RUDRA SOFTECH, 1st floor Geeta Ceramics, 
 * Opp. Thakkarnagar BRTS station, Ahmedbad - 382350, India or
 * at email address info@rudrasoftech.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * RUDRA SOFTECH" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by RUDRA SOFTECH".
*****************************************************************************************/

/**
 * This is the model class for table "users".
 * @package EduSec.models
 */

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;
//use app\modules\employee\models\EmpMaster;
//use app\modules\student\models\StuMaster;

/**
 * This is the model class for table "users".
 *
 * @property integer $user_id
 * @property string $user_login_id
 * @property string $user_password
 * @property string $user_type
 * @property integer $is_block
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property AdmissionLetter[] $admissionLetters
 * @property BatchSubjectAllot[] $batchSubjectAllots
 * @property Batches[] $batches
 * @property City[] $cities
 * @property Country[] $countries
 * @property Courses[] $courses
 * @property DocumentCategory[] $documentCategories
 * @property EmpCategory[] $empCategories
 * @property EmpDepartment[] $empDepartments
 * @property EmpDesignation[] $empDesignations
 * @property EmpDocs[] $empDocs
 * @property EmpMaster[] $empMasters
 * @property EmpSectionAllot[] $empSectionAllots
 * @property EmpStatus[] $empStatuses
 * @property Languages[] $languages
 * @property LoginDetails[] $loginDetails
 * @property MsgOfDay[] $msgOfDays
 * @property NationalHolidays[] $nationalHolidays
 * @property Nationality[] $nationalities
 * @property Notice[] $notices
 * @property Section[] $sections
 * @property State[] $states
 * @property StuAdmissionAcademic[] $stuAdmissionAcademics
 * @property StuAdmissionDocs[] $stuAdmissionDocs
 * @property StuAdmissionMaster[] $stuAdmissionMasters
 * @property StuCategory[] $stuCategories
 * @property StuDocs[] $stuDocs
 * @property StuMaster[] $stuMasters
 * @property StuStatus[] $stuStatuses
 * @property SubjectAllocate[] $subjectAllocates
 * @property SubjectMaster[] $subjectMasters
 * @property User $createdBy
 * @property User[] $users
 * @property User $updatedBy
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $current_pass,$new_pass,$retype_pass;
    public $create_password, $confirm_password, $admin_user;    

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_login_id', 'user_password', 'perfil', 'created_at', 'created_by'], 'required'],
            [['perfil','is_block', 'created_by', 'updated_by'], 'integer'],
        [['current_pass', 'new_pass', 'retype_pass'], 'required','on'=>'change','message'=>''],
        ['current_pass','checkOldPassword','on'=>'change','message'=>''],
        ['retype_pass', 'compare','compareAttribute'=>'new_pass'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_login_id'], 'string', 'max' => 65],
            [['user_password'], 'string', 'max' => 150],
            [['user_login_id'], 'unique'],

        ['confirm_password', 'compare','compareAttribute'=>'create_password', 'on'=>'firstTime'],
        [['create_password', 'confirm_password', 'admin_user'], 'required', 'on'=>'firstTime'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'user_login_id' => Yii::t('app', 'User Login ID'),
            'user_password' => Yii::t('app', 'Password'),
            'perfil' => Yii::t('app', 'perfil'),
            'is_block' => Yii::t('app', 'Is Block'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'current_pass' => Yii::t('app','Current Password'),
            'new_pass' => Yii::t('app','New Password'),
            'retype_pass' => Yii::t('app', 'Retype Password'),
            'admin_user' => Yii::t('app', 'Admin Username'),
            'create_password' => Yii::t('app', 'Admin Password'),
            'confirm_password' => Yii::t('app', 'Confirm Password'),
            
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
       return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */

    public static function findByUsername($username)
    {
    return static::findOne(['user_login_id' => $username]);
    }

      public static function findByMail($email)
    {
    return static::findOne(['mail' => $email]);
    }


    /**
     * Finds user by password reset token
     *
     * @param  string      $token password reset token
     * @return static|null
     */

    public static function findByPasswordResetToken($token)
    {
        $expire = \Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        if ($timestamp + $expire < time()) {
            // token expired
            return null;
        }
        return static::findOne([
            'password_reset_token' => $token
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();

    }
   
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

     /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->user_password === md5($password.$password);
    }

    // Generates "remember me" authentication key
    public function generateAuthKey()
    {
        $this->auth_key = Security::generateRandomKey();
    }

    // Generates new password reset token
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Security::generateRandomKey() . '_' . time();
    }

    // Removes password reset token
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

   /*
     *  @ check old password is correct or wrong.
     */
    public function checkOldPassword($attribute,$params)
    {
    $record = User::find()->where(['user_password'=>md5($this->current_pass.$this->current_pass)])->one();

    if($record === null) {
        $this->addError($attribute, 'Invalid or Wrong password');
    }
    }
}