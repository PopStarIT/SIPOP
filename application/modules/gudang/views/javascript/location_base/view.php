<?php $this->load->view($path_template . '/library/javascript/dashboard_table2'); ?>


<!-- <div style="background-color: white; border: 1px solid #ccc; padding: 10px;">
    <h3>Data Goodnet</h3>
    <button onclick="location.href='<?php echo site_url('goodnet/form/'); ?>'">Tambah Data</button>
    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Goodnet ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($goodnets) && !empty($goodnets)): ?>
                <?php foreach ($goodnets as $goodnet): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($goodnet['goodnet_id']); ?></td>
                        <td><?php echo htmlspecialchars($goodnet['nama']); ?></td>
                        <td><?php echo htmlspecialchars($goodnet['deskripsi']); ?></td>
                        <td>
                            <button onclick="location.href='<?php echo site_url('goodnet/edit/' . $goodnet['goodnet_id']); ?>'">Edit</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>


</div> -->