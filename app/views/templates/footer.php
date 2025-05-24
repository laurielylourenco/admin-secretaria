    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>



    <script>
        $('#tabelaAlunos').DataTable({

            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json'
            },
            responsive: true,
            columnDefs: [{
                orderable: false,
                targets: 4
            }]
        });

        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.sidebar .nav-link');
            const currentFullUrl = window.location.href;
            const currentQueryString = window.location.search;


            let initiallyActiveLinkElement = document.querySelector('.sidebar .nav-link.active');
            let initialHrefForActive = initiallyActiveLinkElement ? initiallyActiveLinkElement.getAttribute('href') : null;

            // 1. Remove a classe 'active' de todos os links
            navLinks.forEach(link => {
                link.classList.remove('active');
            });

            let activeLinkWasSetByUrl = false;


            for (const link of navLinks) {
                const linkAbsoluteHref = link.href;
                const linkOriginalHref = link.getAttribute('href');

                if (linkAbsoluteHref === currentFullUrl) {
                    link.classList.add('active');
                    activeLinkWasSetByUrl = true;
                    break;
                }


                if (linkOriginalHref && linkOriginalHref.includes('?aluno=lista') && currentQueryString.includes('?aluno=lista')) {
                    link.classList.add('active');
                    activeLinkWasSetByUrl = true;
                    break;
                }

            }


            if (!activeLinkWasSetByUrl) {

                if (currentQueryString === "" || currentQueryString === "?") {

                    if (initialHrefForActive === "#" && initiallyActiveLinkElement) {
                        initiallyActiveLinkElement.classList.add('active');
                    } else {

                        const homeLink = Array.from(navLinks).find(l =>
                            l.textContent.trim().toLowerCase() === 'home' &&
                            (l.getAttribute('href') === '#' || l.href === window.location.origin + '/' || l.href === new URL(document.querySelector('.sidebar-header a').href).origin + new URL(document.querySelector('.sidebar-header a').href).pathname)
                        );
                        if (homeLink) {
                            homeLink.classList.add('active');
                        }
                    }
                }
            }

            navLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    const targetHref = this.getAttribute('href');


                    if (targetHref === '#') {
                        event.preventDefault();
                        if (!this.classList.contains('active')) {
                            navLinks.forEach(otherLink => {
                                otherLink.classList.remove('active');
                            });
                            this.classList.add('active');
                        }
                    }

                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deleteConfirmModal = document.getElementById('deleteConfirmModal');
            if (deleteConfirmModal) {
                deleteConfirmModal.addEventListener('show.bs.modal', function(event) {
                    var button = event.relatedTarget;
                    var alunoId = button.getAttribute('data-aluno-id');
                    var alunoNome = button.getAttribute('data-aluno-nome');

                    var studentNameToDelete = deleteConfirmModal.querySelector('#studentNameToDelete');
                    var alunoIdInput = deleteConfirmModal.querySelector('#alunoIdParaExcluir');
                    console.log("alunoIdInput", alunoIdInput)
                    if (studentNameToDelete) {
                        studentNameToDelete.textContent = alunoNome;
                    }
                    if (alunoIdInput) {
                        alunoIdInput.value = alunoId;
                    }
                });
            }

            deleteConfirmModal.addEventListener('hidden.bs.modal', function() {
                if (alunoIdInput) {
                    alunoIdInput.value = ''; // Limpa o valor
                }
                if (studentNameToDelete) {
                    studentNameToDelete.textContent = ''; // Limpa o nome
                }
            });
        });
    </script>

    </html>