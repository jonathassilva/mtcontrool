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
    <h1 style="color: #20B2AA; font-family: Arial">
        <img src="../../images/dash-grande.png" height="70" width="70">
        Dashboard - <?php echo $nomeApp; ?></h1>
</div>
<br/>

<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
       'Dashboard'=>array('runs/index'),
	
        
        $nomeApp,
        '/ Runs ',
        $model->id_order ,
    ),
)); ?>

<br/>

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

<div class="container">
    <div class="tabela">
	<div class="row-fluid">
		<div class="span12">
			<div class="row-fluid">
				<div class="span6">
                                    <div class="row-fluid">
                                        
                                    <div class="span3">
                                        <div class="tabela-dash-prim">
                                            <div class="panel panel-primary">
                                               <div class="panel-heading" text-size="20"><i class="fa fa-play-circle-o fa-lg"></i>  Tests Completed</div>
                                                    <div class="panel-body" >
                                                        
                                                       
                                                       
                                                        <div class="text-right">
					
										<h1><?php echo floor((($quantidadePass + $quantidadeFail)/$quantidadeTotal)*100)?>%</h1>
									
										<p><?php echo ($quantidadePass + $quantidadeFail)?>/<?php echo $quantidadeTotal?> tests completed</p>
									
                                                        </div>
							
                                                    </div></div></div></div>
                                                    <div class="span3">
                                    <div class="tabela-dash-danger">
					 <div class="panel panel-danger">
                                               <div class="panel-heading"><i class="fa fa-thumbs-down fa-lg"></i>  Tests Failed</div>
                                                    <div class="panel-body" >
								
								<div class="col-md-1 text-right">
									<div>
										<h1><?php echo ($quantidadeFail)?> Failed</h1>
									</div>
									<div>
										<p><?php echo $quantidadePass?> passed | <?php echo $quantidadePending?> pending</p>
									</div>
								</div>
							</div>
						</div>
                                                </div></div></div></div>
                                    <div class="span6">
                                    <div class="row-fluid">
				<div class="span3">
                                    <div class="tabela-dash-sucess">
				 <div class="panel panel-success">
                                               <div class="panel-heading"><i class="fa fa-cloud fa-lg"></i>   Platform</div>
                                                    <div class="panel-body" >
							
								
								<div class="col-md-1 text-right">
									<div>
										<h1><?php echo $nomePlataforma; ?></h1>
									</div>
									<div>
										
									</div>
								
							</div>
                                                    </div></div>
                                 </div></div>
                                                <div class="span3">
                                                    <div class="tabela-dash-warning">
						<div class="panel panel-warning">
                                               <div class="panel-heading"><i class="fa fa-mobile fa-lg"></i>  App Version</div>
                                                    <div class="panel-body" >
							
								
								<div class="col-md-1 text-right">
									<div>
										<h1><?php echo $model->version?></h1>
									</div>
									<div>
										<p><?php echo $model->changelog?></p>
									</div>
								</div>
							
						</div>
					</div>
                                                    </div></div></div>
                                    </div></div>
                                
                                </div></div></div></div></div>
<br />
<!-- LISTAGEM -->
<!--<div class="formula"> -->
<div class="panel-dashboard">
<!-- <div class="well-form"> -->
<div class="jumbotron">
	<table class="table table-striped">
		<thead>
			<tr>
				<td><b><?php echo 'Criteria'; ?></b></td>
				<td><b><?php echo 'Code'; ?></b></td>
				<td><b><?php echo 'Test Case'; ?></b></td>
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
				<td><?php if($dp['Status'] == 0){echo TbHtml::labelTb('Pending', array('color' => TbHtml::LABEL_COLOR_WARNING));} else if($dp['Status'] == 1){echo TbHtml::labelTb('Passed', array('color' => TbHtml::LABEL_COLOR_SUCCESS));} else echo TbHtml::labelTb('Failed', array('color' => TbHtml::LABEL_COLOR_IMPORTANT));?></td>

				<td><a href="#modalOcorrencia<?php echo $dp['IDTestRun']?>"
					role="button" class="btn" data-toggle="modal"><i
						class="fa fa-eye"></i></a></td>
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
<!--</div>-->
		<?php }?>
		</tbody>
	</table>

</div>
