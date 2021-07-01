<h1><?= $title; ?></h1>
<hr>
<?= validation_errors();?>
<div class="row">
	<div class="col-lg-12">
		<?= form_open('create');?>
		<div class="form-group mb-2">
			<input type="text" name="title" class="form-control" placeholder="Song Title" value="<?= set_value('title');?>">
		</div>
		<div class="form-group mb-2">
			<input type="text" name="artist" class="form-control" placeholder="Artist" value="<?= set_value('artist');?>">
		</div>
		<div class="form-group">
			<textarea name="lyrics" class="form-control" cols="20" rows="20"><?= set_value('lyrics');?></textarea>
		</div>

		<button type="submit" class="btn btn-success mt-2">Submit</button>
	</div>
</div>