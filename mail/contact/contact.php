Hello <?= $model->name ?>,
<br/><br/>
<p>Thank you for sending me messages. I will contact you if this message is important.<br />
Message that you send are as follows:</p>
<table>
	<tr>
		<td>Subject</td>
		<td>:</td>
		<td><?= $model->subject ?></td>
	</tr>
	<tr>
		<td>Message</td>
		<td>:</td>
		<td><?= $model->message ?></td>
	</tr>
</table>
<br/><br/><br/>
Best Regards,
<br/>
<?= Yii::$app->params['signatureEmailName'] ?>