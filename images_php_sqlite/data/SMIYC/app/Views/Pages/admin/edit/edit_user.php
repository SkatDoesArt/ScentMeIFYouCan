<?php
?>
<form action="<?= site_url('role/' . $user->id) ?>" method="post">
<?= csrf_field() ?>
<input type="hidden" name="statut" value="admin">
<button type="submit">Passer admin</button>
</form>

