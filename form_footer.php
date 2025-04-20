<!-- Footer -->
<footer>
        <p>&copy; 2024 HostoNews. Tous droits réservés. <a href="#privacy">Politique de confidentialité</a>.</p>
    </footer>

    <script>
        // Fonction pour prévisualiser l'image
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
