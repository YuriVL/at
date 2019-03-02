<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class ImportController extends Controller
{

    public function actionCsv()
    {
        $directory= '/home/autotur1/backup';
        //$directory= '/home/vagrant/www/autotur/';

        $FILE = $directory . 'booking_' . date('Y-m-d') . '.csv';
        $this->insert($FILE, new \common\models\SystemBooking());
        $FILE = $directory . 'date_' . date('Y-m-d') . '.csv';
        $this->insert($FILE, new \common\models\SystemDate());
        $FILE = $directory . 'time_' . date('Y-m-d') . '.csv';
        $this->insert($FILE, new \common\models\SystemTime());
        $FILE = $directory . 'link_direction_' . date('Y-m-d') . '.csv';
        $this->insert($FILE, new \common\models\SystemLinkDirection());
    }

    private function insert($file, \yii\db\ActiveRecord $model)
    {
        $sql = "";
        $db =Yii::$app->getDb();
        $db->createCommand('SET FOREIGN_KEY_CHECKS = 0')->execute();
        $db->createCommand('TRUNCATE TABLE '.$model::tableName())->execute();


        $file = fopen($file, 'r');

        $attributes = $model->getAttributes();
        $sql .= "INSERT INTO ".$model::tableName()."(";
        foreach ($attributes as $attribute=>$value){
            $sql .="`".$attribute."`,";
        }
        $sql= substr($sql, 0, -1);
        $sql.=") VALUES ";
        while (($line = fgetcsv($file)) !== FALSE) {
            $sql.="(";

            foreach ($line as $value){
                $sql .= "'".$value."',";
            }
            $sql= substr($sql, 0, -1);
            $sql.="),";
        }
        $sql= substr($sql, 0, -1);
        $sql.=";";
        fclose($file);
        $db->createCommand($sql)->execute();
        $db->createCommand('SET FOREIGN_KEY_CHECKS = 1')->execute();
    }
}