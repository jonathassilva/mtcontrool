<?php
/* @var $this RunsController */
/* @var $model Runs */
?>

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/users.css" />
        
<?php
$this->breadcrumbs = array (
		'Runs' => array (
				'index' 
		),
		$model->id 
);

$this->menu = array (
		array (
				'label' => 'List Runs',
				'url' => array (
						'index' 
				) 
		),
		array (
				'label' => 'Create Runs',
				'url' => array (
						'create' 
				) 
		),
		array (
				'label' => 'Update Runs',
				'url' => array (
						'update',
						'id' => $model->id 
				) 
		),
		array (
				'label' => 'Delete Runs',
				'url' => '#',
				'linkOptions' => array (
						'submit' => array (
								'delete',
								'id' => $model->id 
						),
						'confirm' => 'Are you sure you want to delete this item?' 
				) 
		),
		array (
				'label' => 'Manage Runs',
				'url' => array (
						'admin' 
				) 
		) 
);
?>


<div class="infoblock shadow">
	<h1 style="color: #20B2AA; font-family: Arial">Dashboard - <?php echo $nomeApp; ?></h1>
</div>
<HR SIZE=30 WIDTH=1180 ALIGN=LEFT>



<?php

/*
 * $this->widget ( 'zii.widgets.CDetailView', array (
 * 'htmlOptions' => array (
 * 'class' => 'table table-striped table-condensed table-hover'
 * ),
 * 'data' => $model,
 * 'attributes' => array (
 * 'id_app',
 * 'id_platform',
 * 'description',
 * 'changelog'
 * )
 * ) );
 */
?>


<!-- LISTAGEM 
<div class="well">
	<table class="table table-striped">
		<thead>
			<tr>
				<td><b><?php //echo 'App'; ?></b></td>
				<td><b><?php //echo 'Platform'; ?></b></td>
				<td><b><?php //echo 'Description'; ?></b></td>
				<td><b><?php //echo 'Changelog'; ?></b></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php //echo $nomeApp;?></td>
				<td><?php //echo $nomePlataforma;?></td>
				<td><?php //echo $model->description;?></td>
				<td><?php //echo $model->changelog;?></td>
			</tr>

		</tbody>
	</table>
</div>
-->

<?php
/*
 * $gridColumns = array(
 * array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
 * array('name'=>'criteria', 'header'=>'Criteria'),
 * array('name'=>'code', 'header'=>'Code'),
 * array('name'=>'name', 'header'=>'Name'),
 * array('name'=>'status', 'header'=>'Status'),
 * array(
 * 'htmlOptions' => array('nowrap'=>'nowrap'),
 * 'class'=>'bootstrap.widgets.TbButtonColumn',
 * 'viewButtonUrl'=>null,
 * 'updateButtonUrl'=>null,
 * 'deleteButtonUrl'=>null,
 * )
 * );
 *
 *
 * $gridDataProvider = new CArrayDataProvider ( $testRuns );
 * $this->widget ( 'bootstrap.widgets.TbGridView', array (
 * 'dataProvider' => $gridDataProvider,
 * 'template' => "{items}",
 * 'columns' => $gridColumns,
 * ) );
 */
?>
<div class="panel panel-primary">
	<div class="row-fluid">
		<div class="span12">
			<div class="row-fluid">
				<div class="span6">
					<div class="row-fluid">
						<div class="span6"
							style="background-color: #a5c2ed; padding: 15px">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-thumbs-down fa-4x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div>
										<h1><?php echo floor(($quantidadePass/$quantidadeTotal)*100)?>%</h1>
									</div>
									<div>
										<p><?php echo ($quantidadePass + $quantidadeFail)?>/<?php echo $quantidadeTotal?> tests completed</p>
									</div>
								</div>
							</div>
						</div>
						<div class="span6"
							style="background-color: #e4837b; padding: 15px">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-thumbs-down fa-4x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div>
										<h1><?php echo ($quantidadeFail)?> failed</h1>
									</div>
									<div>
										<p><?php echo $quantidadePass?> passed | <?php echo $quantidadePending?> pending</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="span6">
					<div class="row-fluid">
						<div class="span6"
							style="background-color: #83e69f; padding: 15px">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-thumbs-down fa-4x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div>
										<h1><?php echo "Platform"?></h1>
									</div>
									<div>
										<p>Current: <?php echo $nomePlataforma;?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="span6"
							style="background-color: #fb995e; padding: 15px">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-thumbs-down fa-4x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div>
										<h1><?php echo $model->description?></h1>
									</div>
									<div>
										<p><?php echo $model->changelog?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br />
<!-- LISTAGEM -->
<div class="well">
	<table class="table table-striped">
		<thead>
			<tr>
				<td><b><?php echo 'Criteria'; ?></b></td>
				<td><b><?php echo 'Code'; ?></b></td>
				<td><b><?php echo 'Name'; ?></b></td>
				<td><b><?php echo 'Status'; ?></b></td>
				<td><b><?php echo 'Operations'; ?></b></td>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($dados as $dp){?>
		<tr>
				<td><?php echo $dp['NomeCriterio']?></td>
				<td><?php echo $dp['NumeroTeste'];?></td>
				<td><?php echo $dp['NomeTeste']?></td>
				<td><?php if($dp['Status'] == 0){echo TbHtml::labelTb('Pending', array('color' => TbHtml::LABEL_COLOR_WARNING));} else if($dp['Status'] == 1){echo TbHtml::labelTb('Passed', array('color' => TbHtml::LABEL_COLOR_SUCCESS));} else echo TbHtml::labelTb('Fail', array('color' => TbHtml::LABEL_COLOR_IMPORTANT));?></td>

				<td><a href="#modalOcorrencia<?php echo $dp['IDTestRun']?>"
					role="button" class="btn" data-toggle="modal"><i
						class="icon-eye-open"></i></a></td>
			</tr>

			<!-- Informa��es detalhadas das ocorr�ncias -->
			<div id="modalOcorrencia<?php echo $dp['IDTestRun']?>"
				class="modal hide fade" tabindex="-1" role="dialog"
				aria-labelledby="myModalLabel" aria-hidden="true">

				<div class="modal-header">
					<h3 id="myModalLabel"><?php CHtml::encode("Test Description")?></h3>
				</div>

				<div class="modal-body">
					<div class="form-horizontal">
						<fieldset>
							<legend>Criteria</legend>
							<p>
								<strong>Name: </strong><?php echo $dp['NomeCriterio'];?></p>
						</fieldset>

						<fieldset>
							<legend>Test Information</legend>
							<p>
								<strong>Code: </strong><?php echo $dp['NumeroTeste'];?></p>
							<p>
								<strong>Name: </strong><?php echo $dp['NomeTeste'];?></p>
							<p>
								<strong>Description: </strong><?php echo $dp['Descricao'];?></p>
						</fieldset>

						<fieldset>
							<legend>Proceedings</legend>
							<p>
								<strong>Notes: </strong><?php echo $dp['Notas'];?></p>
							<p>
								<strong>Steps: </strong><?php echo $dp['Passos'];?></p>
							<p>
								<strong>Result: </strong><?php echo $dp['Resultado'];?></p>
						</fieldset>
					</div>
				</div>

				<div class="modal-footer">
					<?php echo TbHtml::link('Pass', array('runs/passTestRun', 'id'=> $dp['IDTestRun']), array('class'=>'btn btn-success'));?>
					<?php echo TbHtml::link('Fail', array('runs/failTestRun', 'id'=> $dp['IDTestRun']),array('class'=>'btn btn-danger')); ?>
					<?php echo TbHtml::button('Close', array('data-dismiss' => 'modal')); ?>
				</div>
			</div>				
		<?php }?>
		</tbody>
	</table>

</div>
