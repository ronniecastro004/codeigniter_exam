<?php if ($this->session->flashdata('notification_status')) : ?>
	<?= '<p class="alert alert-success mt-2">'.$this->session->flashdata('notification_msg').'</p>'; ?>
<?php endif; ?>
<h1><?= $title; ?></h1>

<table id="table_id" class="display">
  <thead>
    <tr>
      <th>Title</th>
      <th>Created At</th>
      <th width="10%">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($songs as $song) { ?>
		<tr>
			<td><?= $song['title']; ?></td>
			<td><?= $song['created_at']; ?></td>
			<td class="text-center">
          		<div class="dropdown">
				  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				    <a class="dropdown-item" href="<?= base_url();?><?= $song['id']; ?>">View Details</a>
				    <a class="dropdown-item" href="edit/<?= $song['id']; ?>">Edit Details</a>
				    <a class="dropdown-item btn-delete" href="#" data-url="delete/<?= $song['id']; ?>">Delete</a>
				  </div>
				</div>
            </td>
		</tr>
	<?php } ?>
  </tbody>
</table>

