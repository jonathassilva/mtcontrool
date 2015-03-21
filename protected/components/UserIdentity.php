<?php
 
/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     *
     * @return boolean whether authentication succeeds.
     */
  /* OFICIAL private $_id, $_username;
    public function authenticate() {
         
         
          $record = Users::model ()->findByAttributes (array('user_name' => $this->username));
          if ($record === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
          } elseif ($record->password !== md5($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
          } else {
            $this->_id = $record->id;
            $this->username = $record->user_name;
            $this->setState ('name', $record->name);
            $this->errorCode = self::ERROR_NONE;
          }
          echo md5($this->password);
          return ! $this->errorCode;
                  }*/
                   



 private $_id;
    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $username = strtolower($this->username);
                // from database... change to suite your authentication criteria
        $user = Users::model()->find('LOWER(user_name)=?', array($username));
        if($user===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        elseif ($user->password !== md5($this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else{
            $this->_id = $user->id;
            $this->username = $user->user_name;
            $this->errorCode = self::ERROR_NONE;
        }
         echo md5($this->password);
        return $this->errorCode == self::ERROR_NONE;
    }
    public function getId()
    {
        return $this->_id;
    }
        /*$users = array (
                 
                // username => password
                'demo' => 'demo',
                'admin' => 'admin' 
        );
        if (! isset ( $users [$this->username] ))
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        elseif ($users [$this->username] !== $this->password)
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else
            $this->errorCode = self::ERROR_NONE;
        return ! $this->errorCode;
    }*/
/*  public function getId() {
        return $this->_id;
    } */
}