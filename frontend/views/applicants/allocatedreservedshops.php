<?
 use yii\helpers\Url;
?>
<style>
 .container{
		padding-top: 20px;
	}
</style>
<div class="container ">
	<h1> Create Exemption</h1>
	<div class="row">
		<div class="col-sm-12">
			<? if(!empty($model)){?>
			
			<table class="table striped">
				<tr>
					<td>SN</td>
					<td>Applicant</td>
					<td>Shop Number</td>
					<td>Action</td>
				</tr>
			<? $i = 1; foreach($model as $key =>$value){?>
				<? if(empty($value->exemption)){?>
				<tr>
					<td><?= $i;?></td>
					<td><?= $value->booking->file->applicantid->applicant_type == 1?$value->booking->file->applicantid->individual->fullname:$value->booking->file->applicantid->organization->organization_name;?></td>
					<td><?= $value->name;?></td>
					<td><input type="checkbox"  name="requestapproval" value="<?= $value->id?>"></td>
				</tr>
			
			<? $i++;}}}?>
			</table>
			
			<button class="btn btn-success proccess"  data-who="ah">Create Exemption (AH-PROPERTIES)</button>
			<button class="btn btn-primary proccess"  data-who="masarki">Create Exemption (MASARKI)</button>
		
		</div>
	</div>
	
</div>

							<?
	
	$proccessResservedAproval = Url::to(['applicants/proccessreservedapproval']);
	$exemptionPrint = Url::to(['applicants/allocatedreservedshopsprint']);
	$biodataform = <<<JS
	
	$(".proccess").on("click", function() {
	var checkedValue = []
  $("input:checkbox[name=requestapproval]:checked").each(function(){
    checkedValue.push($(this).val());
	
});
if(checkedValue.length < 1){
 alert('Please You Must Select Atleast One Applicant')
 return ;
}

if(checkedValue.length > 10){
 alert('Please Selection should be limited to 10 or less than 10')
 return ;
}
var who = $(this).data('who');
var serialiseCheckeValue = checkedValue ;


$.post('$proccessResservedAproval',
       {data: serialiseCheckeValue,who:who},
       function(response){
	   window.open('$exemptionPrint'+'&id='+response.data, '_blank');
	   location.reload();
           console.log(response);
       }
);



//alert(serialiseCheckeValue)
});




JS;
 
$this->registerJs($biodataform);
?>



