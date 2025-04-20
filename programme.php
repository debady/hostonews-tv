<?php 
    $titre_appli = "Programmes "; 
    include('entete1.php');
    include('entete2.php');
?>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .search-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .date-fields {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 20px;
        }

        .date-fields input[type="date"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .search-container button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #0056b3;
        }
    </style>
    <section class="featured-product section-padding">
        <div class="container">
            <div class="search-container">
                <form id="date-search-form">
                    <div class="date-fields">
                        <input type="date" id="start-date" name="start-date" required placeholder="Date de début">
                        <input type="date" id="end-date" name="end-date" required placeholder="Date de fin">
                    </div>
                    <button type="submit">Rechercher</button>
                </form>
            </div>
        </div>
    </section>

    <?php if ($alerte): ?>
        <script>
            Swal.fire({
                title: 'Notification',
                text: '<?= htmlspecialchars($alerte) ?>',
                icon: 'info', // Peut être 'success', 'error', 'warning', 'info'
                confirmButtonText: 'OK',
                timer: 5000,
                timerProgressBar: true 
            });
        </script>
    <?php 
        endif; 
        include('session_emission.php');
    ?>

</main>
<?php include('footer.php');?>