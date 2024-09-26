<table class="table1"  id="list"><br><br>
	<thead>
		<tr>
			<th><center>No.</center></th>
			<th><center>Nama</center></th>
			<th><center>Kelas</center></th>
			<th><center>Action</center></th>
		</tr>
	</thead>
	<tbody>
	<?php $no=1; foreach ($table->result() as $d) { ?>
		<tr>
			<td align="center" style="background-color:#bdc3c7;"><?php echo $no; ?></td>
			<td align="left" style="background-color:#bdc3c7;"><?php echo $d->nama; ?></td>
			<td align="center" style="background-color:#bdc3c7;" ><?php echo $d->kelas; ?></td>
			<td align="center" style="background-color:#bdc3c7;">
				<button type="button" data-toggle="modal" id="<?php echo $d->id; ?>" data-target="#edit_modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
				 <button type="button" data-toggle="modal" id="<?php echo $d->id; ?>" data-target="#hapus_modal" class="btn btn-danger btn-sm" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button> 
			</td>
		</tr>
	<?php $no++ ; } ?>	
	</tbody>
</table>

<script type="text/javascript">
	$('#list').DataTable({
      "dom": '<"toolbar">frtip',
      "bFilter": false,
        "bInfo": false,
        "pagingType": "simple_numbers",
        "pageLength": 10,
      "iDisplayLength": 25
    });
</script>