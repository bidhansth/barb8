<?php if (count($errors) > 0) : ?>
  <div class="alert alert-danger barbalert">
	<?php foreach ($errors as $error) : ?>
	  <strong>Error!</strong> <?php echo $error ?>
	<?php endforeach ?>
  </div>
<?php endif ?>