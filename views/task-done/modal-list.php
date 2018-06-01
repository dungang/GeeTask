<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
	任务更新状态记录
</div>
<div class="modal-body">
<?=$this->render('_list', ['dataProvider' => $dataProvider,'searchModel' => $searchModel])?>
</div>