<?php 
    include '../conn.php';

    $id = $_GET["id"];

    if ( hapusP($id) > 0) {
        echo "
        <script>
        alert('keluhan ditolak');
        document.location.href = 'keluhan.php'
        </script>
        ";
        
    }else{
        echo "
            <script>
            alert('data gagal dihapus');
            document.location.href = 'keluhan.php'
            </script>
            ";
    }
?>