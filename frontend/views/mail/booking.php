<?php
/* @var $model \common\models\SystemOrders */
use common\models\SystemDirection;

$direction = SystemDirection::getDirectionById($model->direction ?? 1);

?>

<table bgcolor="#f7f8f8" border="0" cellpadding="0" cellspacing="0" style="margin:0; padding:30px 0; width: 100%"
       width="100%">
    <tbody>
    <tr>
        <td align="center" valign="top" height="100%" style="padding: 0 10px;">
            <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0"
                   style="max-width:700px; min-width:300px; width: 100%; font-family:Tahoma,sans-serif; font-size:14px; color:#373737; border: 1px solid #dedede;"
                   width="100%">
                <tbody>
                <tr>
                    <td align="left" valign="middle" style="padding:10px 30px; border-bottom: 1px solid #ebebeb;">
                        Имя
                    </td>
                    <td align="right" style="padding:10px 30px 10px 0; border-bottom: 1px solid #ebebeb;">
                        <?= $model->fio ?? '' ?>
                    </td>
                </tr>

                <tr>
                    <td align="left" valign="middle" style="padding:10px 30px; border-bottom: 1px solid #ebebeb;">
                        Email:
                    </td>
                    <td align="right" style="padding:10px 30px 10px 0; border-bottom: 1px solid #ebebeb;">
                        <?= $model->email ?? ''; ?>
                    </td>
                </tr>

                <tr>
                    <td align="left" valign="middle" style="padding:10px 30px; border-bottom: 1px solid #ebebeb;">
                        Телефон:
                    </td>
                    <td align="right" style="padding:10px 30px 10px 0; border-bottom: 1px solid #ebebeb;">
                        <?= $model->phone ?? ''; ?>
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="middle" style="padding:10px 30px; border-bottom: 1px solid #ebebeb;">
                        Направление:
                    </td>
                    <td align="right" style="padding:10px 30px 10px 0; border-bottom: 1px solid #ebebeb;">
                        <?= $direction->direction ?? ''; ?>
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="middle" style="padding:10px 30px; border-bottom: 1px solid #ebebeb;">
                        Дата:
                    </td>
                    <td align="right" style="padding:10px 30px 10px 0; border-bottom: 1px solid #ebebeb;">
                        <?= $model->date ?? '';  ?>
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="middle" style="padding:10px 30px; border-bottom: 1px solid #ebebeb;">
                        Количество мест:
                    </td>
                    <td align="right" style="padding:10px 30px 10px 0; border-bottom: 1px solid #ebebeb;">
                        <?= $model->seats ?? '';  ?>
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="middle" style="padding:10px 30px; border-bottom: 1px solid #ebebeb;">
                        Комментарий:
                    </td>
                    <td align="right" style="padding:10px 30px 10px 0; border-bottom: 1px solid #ebebeb;">
                        <?= $model->comment ?? '' ?>
                    </td>
                </tr>

                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>