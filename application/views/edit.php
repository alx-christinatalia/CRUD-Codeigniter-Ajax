<?php foreach ($table->result() as $edit) { ?>
  <input type="hidden" name="id" id="id_edit" value="<?php echo $edit->id; ?>">
 	<div class="form-group">
 		<label>Nama :</label>
 		<input value="<?php echo $edit->nama; ?>" id="nama_edit" type="text" name="nama" class="form-control" required="">
 	</div>
 	<div class="form-group">
 		<label>Kelas :</label>
 		<select class="select2" name="kelas" id="kelas_edit" style="width: 100%" required="">
 			<option value=""> -Pilihan- </option>
 			<option <?php if($edit->kelas=="XRPA"){ echo "selected";} ?> value="XRPA">XRPA</option>
 			<option <?php if($edit->kelas=="XRPB"){ echo "selected";} ?> value="XRPB">XRPB</option>
 		</select>
 	</div>
 	<?php } ?>
 

 <script type="text/javascript">
 	 $('.select2').select2();
 </script>