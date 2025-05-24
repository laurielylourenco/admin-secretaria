    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    


    <script>
        // Seleciona todos os links de navegação dentro da sidebar
        const navLinks = document.querySelectorAll('.sidebar .nav-link');

        // Função para remover a classe 'active' de todos os links
        function removeActiveClasses() {
            navLinks.forEach(link => {
                link.classList.remove('active');
            });
        }

        // Adiciona um ouvinte de evento de clique a cada link
        navLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                // Remove a classe 'active' de todos os links
                removeActiveClasses();
                // Adiciona a classe 'active' ao link clicado
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>
