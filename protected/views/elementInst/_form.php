<?php
/* @var $this ElementInstController */
/* @var $model ElementInst */
/* @var $form TbActiveForm */
?>

    <!--<link href="http://localhost/mtcontrool/mtcontrool/bootstrap-switch/docs/css/highlight.css" rel="stylesheet">
    <link href="http://localhost/mtcontrool/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">
    <link href="http://getbootstrap.com/assets/css/docs.min.css" rel="stylesheet">
    

    <script src="http://localhost/mtcontrool/bootstrap-switch/docs/js/jquery.min.js"></script>
    <script src="http://localhost/mtcontrool/bootstrap-switch/docs/js/highlight.js"></script>
    <script src="http://localhost/mtcontrool/bootstrap-switch/dist/js/bootstrap-switch.js"></script>
    <script src="http://localhost/mtcontrool/bootstrap-switch/docs/js/main.js"></script>
 -->

    <script language="javascript">
    
    
    function Hab(i){
        //alert("hab");
        if(document.getElementById("type_field["+i+"]").value=="nominal"){
            document.getElementById("description_field["+i+"]").disabled=false;
            document.getElementById("start_field["+i+"]").disabled=true;
            document.getElementById("end_field["+i+"]").disabled=true;
            document.getElementById("start_field["+i+"]").value='';
            document.getElementById("end_field["+i+"]").value='';
        }else if(document.getElementById("type_field["+i+"]").value=="interval"){
            document.getElementById("description_field["+i+"]").disabled=false;
            document.getElementById("start_field["+i+"]").disabled=false;
            document.getElementById("end_field["+i+"]").disabled=false;
        }else{
            document.getElementById("description_field["+i+"]").disabled=true;
            document.getElementById("start_field["+i+"]").disabled=true;
            document.getElementById("end_field["+i+"]").disabled=true;
            document.getElementById("start_field["+i+"]").value="";
            document.getElementById("end_field["+i+"]").value="";
        }
        //document.getElementById("lementInst_0_START_PARAM").disabled=true;
        /*$.each(element, function(key, value){
            //alert(""+value.children[4].children[0].children[1].children[0].id+"");
            //alert(""+value.children[2].children[0].children[1].children[0].id+"");
            document.getElementById("start_field[0]").disabled=true;
            if(value.children[0].children[0].checked == true){
                document.getElementById(""+value.children[2].children[0].children[1].children[0].id+"").disabled=false;
                document.getElementById(""+value.children[3].children[0].children[1].children[0].id+"").disabled=false;
                if(document.getElementById(""+value.children[2].children[0].children[1].children[0].id+"").value=="interval"){
                    //alert("nominal");
                    document.getElementById(""+value.children[4].children[0].children[1].children[0].id+"").disabled=false;
                    document.getElementById(""+value.children[5].children[0].children[1].children[0].id+"").disabled=false;
                }
                
            } else {
                
                document.getElementById(""+value.children[2].children[0].children[1].children[0].id+"").disabled=true;
                document.getElementById(""+value.children[3].children[0].children[1].children[0].id+"").disabled=true;
                document.getElementById(""+value.children[4].children[0].children[1].children[0].id+"").disabled=true;
                document.getElementById(""+value.children[5].children[0].children[1].children[0].id+"").disabled=true;
            }

        });*/
    }

    function valida(element){
        $.each(element, function(key, value){
            //alert(""+value.children[2].children[0].children[1].children[0].id+"");
            if(value.children[0].children[0].checked == true){
                document.getElementById(""+value.children[2].children[0].children[1].children[0].id+"").disabled=false;
                document.getElementById(""+value.children[3].children[0].children[1].children[0].id+"").disabled=false;
                if(document.getElementById(""+value.children[2].children[0].children[1].children[0].id+"").value=="interval"){
                    //alert("nominal");
                    document.getElementById(""+value.children[4].children[0].children[1].children[0].id+"").disabled=false;
                    document.getElementById(""+value.children[5].children[0].children[1].children[0].id+"").disabled=false;
                }
                if (document.getElementById(""+value.children[2].children[0].children[1].children[0].id+"").selectedIndex==false){
                    document.getElementById(""+value.children[3].children[0].children[1].children[0].id+"").disabled=true;
                    document.getElementById(""+value.children[4].children[0].children[1].children[0].id+"").disabled=true;
                    document.getElementById(""+value.children[5].children[0].children[1].children[0].id+"").disabled=true;
                }
            } else {
                
                document.getElementById(""+value.children[2].children[0].children[1].children[0].id+"").disabled=true;
                document.getElementById(""+value.children[3].children[0].children[1].children[0].id+"").disabled=true;
                document.getElementById(""+value.children[4].children[0].children[1].children[0].id+"").disabled=true;
                document.getElementById(""+value.children[5].children[0].children[1].children[0].id+"").disabled=true;
            }

        });
    }
    function desableAll(){
    //$(document).ready(function() {
        //valida campos checkbox das bebidas 
        var todos_inputs = document.getElementsByTagName('input');    
        for (var i=0; i<=todos_inputs.length; i++){
            //alert(i);
            //if(todos_inputs[i].id == "chk"){
                /*if(todos_inputs[i].checked == true){
                    alert('input: '+i);
                    //var ok = true;
                    document.getElementById("type_field["+i+"]").disabled=false;
                    document.getElementById("description_field["+i+"]").disabled=false;
                    document.getElementById("start_field["+i+"]").disabled=false;
                    document.getElementById("end_field["+i+"]").disabled=false;
                    //break;
                }
                else{*/
                    if(document.getElementById("type_field["+i+"]").selectedIndex==false){
                        document.getElementsByTagName('input').checked=false;
                        //document.getElementById("type_field["+i+"]").disabled=true;
                        document.getElementById("type_field["+i+"]").disabled=true;
                        document.getElementById("description_field["+i+"]").disabled=true;
                        document.getElementById("start_field["+i+"]").disabled=true;
                        document.getElementById("end_field["+i+"]").disabled=true;
                    }
                    else if(document.getElementById("type_field["+i+"]").value=="nominal"){
                        document.getElementsByTagName('input').checked=true;
                        //document.getElementById("type_field["+i+"]").disabled=true;
                        document.getElementById("type_field["+i+"]").disabled=false;
                        document.getElementById("description_field["+i+"]").disabled=false;
                        document.getElementById("start_field["+i+"]").disabled=true;
                        document.getElementById("end_field["+i+"]").disabled=true;
                    }else{
                        document.getElementById("chk["+i+"]").checked=true;
                    }
                    
                    //break;
                //}
                //var ok = false;
            //}
        }
 
     /*if (ok == false){
     alert('Selecione a(s) bebida(s) preferida(s)!');
     //document.orcamento.bebi1.focus();
     return false;
     } 
 
 
     alert("Contato enviado com sucesso, em breve entraremos em contato!");
     document.orcamento.submit();*/
 //});
    }

</script>
 
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'element-inst-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

   

<table>
<!--<tr><th>ID_ELEMENT</th><th>ID_TEST</th><th>TYPE</th><th>Description</th><th>START</th><th>END</th></tr>-->

<?php foreach($arrayModels as $i=>$model): ?>

    <?php echo $form->errorSummary($model); ?>
            <tr>
            <!--<td><input class="input" type="checkbox" name="option" value="estado" unchecked onchange="valida()" id='chk<?php //echo "[$i]";?>' /> </td>-->
            <td><input type="checkbox" name="option" value="estado" unchecked onchange="valida($(this).parent().parent())" id='chk<?php echo "[$i]";?>' /> </td>
            <td> 
            <?php 
        
            $name = Element::model()->findByPK($model->ID_ELEMENT);
            echo "<b>".$name->DESCRIPTION."<b/>";
            

            ?></td> 
            
            <td><?php echo $form->dropDownListControlGroup($model,"[$i]ELEMENT_TYPE",$arrayElementType,array('id'=>"type_field[$i]",'empty' => '--- Choose a type ---'/*,'span'=>5,'maxlength'=>10*/,'onchange'=>"Hab($i)")); ?></td>
            <!-- <td><?php echo $form->textFieldControlGroup($model,"[$i]ID_ELEMENT",array('id'=>"id_element_field[$i]",'span'=>5)); ?></td>

            <td><?php echo $form->textFieldControlGroup($model,"[$i]ID_TEST_CONTEXT",array('id'=>"id_test_context_field[$i]",'span'=>5)); ?></td>-->

            <td><?php echo $form->textFieldControlGroup($model,"[$i]DESCRIPTION",array('id'=>"description_field[$i]",'span'=>5,'maxlength'=>50)); ?></td>

            <td><?php echo $form->textFieldControlGroup($model,"[$i]START_PARAM",array('id'=>"start_field[$i]",'size'=>5/*,'span'=>5*/)); ?></td>

            <td><?php echo $form->textFieldControlGroup($model,"[$i]END_PARAM",array('id'=>"end_field[$i]",'size'=>5/*,'span'=>5*/)); ?></td>
            <?php if($flag=='update'):?>
                <?php if($model->DESCRIPTION!=''):?>
                <td>
                    <?php echo CHtml::link('delete','#',array('submit'=>array('/elementInst/delete?id='.$model->ID."&idTestContext=".$idTestContext."&idDevice=".$idDevice),'confirm'=>'Are you sure to delete this?')); ?>
            
                    <?php 
                    /*echo CHtml::ajaxLink('delete',
                    Yii::app()->createUrl('/elementinst/delete?id='.$model->ID."&idTestContext=".$idTestContext."&idDevice=".$idDevice),
                    array(
                        'type'=>'post',
                        'data' => array('id' =>$model->ID,'type'=>'delete'),
                        'update'=>'message',
                        'success' => 'function(response) {
                        $(".message").html(response);
                        $(".elementinst_'.$model->ID.'").remove();
                        }',
                        ),
                        array( 'confirm'=>'Are you sure to delete this question',)
                    );*/
                    ?>
                    </td>
                <?php endif;?>
            <?php endif;?>
            <tr>

<?php endforeach; ?>
</table>
        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Save' : 'Next',array(
        //echo TbHtml::submitButton('Next',array(
        'color'=>TbHtml::BUTTON_COLOR_SUCCESS,
        'size'=>TbHtml::BUTTON_SIZE_LARGE,
        )); ?>

        <?php echo TbHtml::submitButton('Cancel',array(
            'name' => 'buttonCancel',
            'color'=>TbHtml::BUTTON_COLOR_DANGER,
            'size'=>TbHtml::BUTTON_SIZE_LARGE,
        )); ?>
    </div>

    <script type="text/javascript">
      desableAll();
      //valida();
    </script>


    <?php $this->endWidget(); ?>

</div><!-- form -->