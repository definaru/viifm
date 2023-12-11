<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    //public $verifyCode;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'required', 'message' => 'Введите ваше имя'],
            ['name', 'match', 'pattern'=>'/^[а-яА-ЯёЁ]+$/u', 'message' => 'Напишите ваше реальное имя!'],
            ['subject', 'required', 'message' => 'Уточните тему письма'],
            ['email', 'required', 'message' => 'Укажите ваш электронный адрес'],
            ['body', 'required', 'message' => 'Напишите ваше сообщение'],
            ['email', 'email', 'message' => 'Указанный адрес не является электронной почтой'],
            //['verifyCode', 'required', 'message' => 'Напишите код с картинки'],
            //['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setReplyTo([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }
}
