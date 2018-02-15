<?php

namespace app\models;

use Yii;

class Mailer {

    const TYPE_REGISTRATION = 1;
    const TYPE_PASSWORD_RESET = 2;

    private static $render_file;
    private static $render_params = [];    
    private static $from = ['devloji.mail@gmail.com' => 'Acme Mailer'];
    private static $to;
    private static $subject;

    public static function validate($type, $model)
    {
        switch ($type) {

            case self::TYPE_REGISTRATION:
                if (
                    empty($model->id) ||
                    empty($model->uid) || 
                    empty($model->username) || 
                    empty($model->email)
                ) {
                    return false;
                }
                self::$to = [$model->email];
                self::$subject = Yii::t('app', 'Please active your account');
                self::$render_file = 'registration';
                self::$render_params = ['user' => $model];
                break;

            case self::TYPE_PASSWORD_RESET:
                
                break;
                
            
            default:
                return false;
        }
        return true;
    }

    public static function send($type, $model)
    {
        if (!self::validate($type, $model)) {
            return false;
        }
        //Send Email
        $message = \Yii::$app->mailer->compose(self::$render_file, self::$render_params);
        return $message->setFrom(self::$from)->setTo(self::$to)->setSubject(self::$subject)->send();


    }
}