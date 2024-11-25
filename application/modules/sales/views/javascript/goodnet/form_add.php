<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Goodnet Management</title>
</head>

<body>

    <!-- Tampilkan pesan flash jika ada -->
    <?php if ($this->session->flashdata('message')): ?>
        <p style="color: green;"><?php echo $this->session->flashdata('message'); ?></p>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>

    <!-- Form untuk tambah data -->
    <h1>Add Goodnet</h1>
    <form action="<?php echo base_url('goodnet/post_add_edit'); ?>" method="POST">
        <label for="goodnet_id">Goodnet ID:</label>
        <input type="number" name="goodnet_id" id="goodnet_id" required>
        <br>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required>
        <br>
        <label for="deskripsi">Deskripsi:</label>
        <input type="text" name="deskripsi" id="deskripsi" required>
        <br>

        <!-- Include CSRF token -->
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

        <input type="submit" value="Save">
    </form>
</body>

</html>