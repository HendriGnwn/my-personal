Hello <?=Yii::$app->params['signatureEmailName']?>,
<br/><br/>
<p><?= $model->name ?> have been contacted you through from contact on the website. The Messages sent is as folows:</p>
<table>
	<tr>
		<td>From</td>
		<td>:</td>
		<td><?= $model->name ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?= $model->email ?></td>
	</tr>
	<tr>
		<td>Phone</td>
		<td>:</td>
		<td><?= $model->phone ?></td>
	</tr>
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
<br/><br/>
Thanks.
