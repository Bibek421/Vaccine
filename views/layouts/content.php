<?php
/**
 *
 * @package    Material Dashboard Yii2
 * @author     CodersEden <hello@coderseden.com>
 * @link       https://www.coderseden.com
 * @copyright  2020 Material Dashboard Yii2 (https://www.coderseden.com)
 * @license    MIT - https://www.coderseden.com
 * @since      1.0
 */

use yii\widgets\Breadcrumbs;
use app\widgets\Alert;

?>
<div class="col-sm-12" style="margin-top:5%;">
<?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            //  'options'=> ['style'=>'background-color:#9cd3fb;color:white;'],
        ]) ?>
        <?= Alert::widget() ?>
<?= $content ?>
</div>
