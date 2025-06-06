<?php
namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "channel".
 *
 * @property int $id
 * @property string $nickname
 * @property string $title
 * @property string|null $description
 * @property string|null $avatar
 * @property string|null $theme
 * @property int $subscribers
 * @property float $prr
 * @property string $created_at
 */
class Channel extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'channel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nickname', 'title'], 'required'],
            [['description'], 'string'],
            [['subscribers'], 'integer'],
            [['prr'], 'number'],
            [['created_at'], 'safe'],
            [['nickname', 'title', 'avatar', 'theme'], 'string', 'max' => 255],
            [['nickname'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nickname' => 'Nickname',
            'title' => 'Название',
            'description' => 'Описание',
            'avatar' => 'Аватар',
            'theme' => 'Тематика',
            'subscribers' => 'Число подписчиков',
            'prr' => 'Индекс вовлечённости',
            'created_at' => 'Дата добавления',
        ];
    }
}