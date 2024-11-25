<h3>Edit Goodnet</h3>
<form id="editGoodnetForm">
    <input type="hidden" id="goodnet_id" value="<?php echo $goodnet['goodnet_id']; ?>">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" value="<?php echo $goodnet['nama']; ?>" required>
    <br>
    <label for="deskripsi">Deskripsi:</label>
    <input type="text" id="deskripsi" value="<?php echo $goodnet['deskripsi']; ?>" required>
    <br>
    <button type="button" onclick="updateGoodnet()">Update</button>
    <button type="button" onclick="location.href='goodnet'">Cancel</button>
</form>

<script type="text/javascript">
    function updateGoodnet() {
        const goodnet_id = document.getElementById('goodnet_id').value;
        const nama = document.getElementById('nama').value;
        const deskripsi = document.getElementById('deskripsi').value;

        if (!nama || !deskripsi) {
            alert("Nama and Deskripsi are required.");
            return;
        }

        fetch('goodnet/post_add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    goodnet_id,
                    nama,
                    deskripsi
                })
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                if (data.valid) {
                    location.href = 'goodnet'; // Redirect back to the main Goodnet page
                }
            })
            .catch(error => console.error('Error:', error));
    }
</script>