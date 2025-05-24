 <style>
     body {
         display: flex;
         min-height: 100vh;
         overflow-x: hidden;
     }

     .sidebar {
         width: 260px;
         background-color: #2d3238;

         padding: 1.5rem 1rem;
         display: flex;
         flex-direction: column;
         transition: margin-left 0.3s;

         height: 100vh;
         position: sticky;
         top: 0;

     }

     .sidebar .sidebar-header {
         margin-bottom: 1.5rem;
         text-align: center;
     }

     .sidebar .sidebar-header a {
         font-size: 1.75rem;
         font-weight: bold;
         color: #fff;
         text-decoration: none;
     }

     .sidebar .sidebar-header a .bi {
         margin-right: 0.5rem;
     }

     .sidebar .nav-link {
         font-size: 0.95rem;
         color: #adb5bd;
         padding: 0.75rem 1rem;
         border-radius: 0.375rem;

         margin-bottom: 0.25rem;
     }

     .sidebar .nav-link .bi {
         margin-right: 0.8rem;
         font-size: 1.1rem;
         vertical-align: middle;
     }

     .sidebar .nav-link:hover {
         background-color: #3a4047;
         color: #fff;
     }

     .sidebar .nav-link.active {
         background-color: #0d6efd;
         color: #fff;
     }

     .sidebar .logout-section {
         margin-top: auto;

         padding-top: 1rem;
         border-top: 1px solid #495057;

     }

     .sidebar .logout-section .nav-link {
         margin-bottom: 0;
     }

     .main-content {
         flex-grow: 1;
         padding: 2rem;
         background-color: #f8f9fa;

     }


     .page-title {
         text-transform: uppercase;
         font-size: 0.75rem;
         color: #6c757d;
         font-weight: bold;
         margin-bottom: 0.5rem;
         letter-spacing: 0.05em;
     }

     .main-header {
         display: flex;
         justify-content: space-between;
         align-items: center;
         margin-bottom: 1.5rem;
     }
 </style>
 <nav class="sidebar">
     <div class="sidebar-header">
         <a href="#">
             <i class="bi bi-bar-chart-steps"></i> <span>Secretaria</span>
         </a>
     </div>

     <ul class="nav nav-pills flex-column">
         <li class="nav-item">
             <a href="#" class="nav-link" aria-current="page">
                 <i class="bi bi-house-door-fill"></i>
                 Home
             </a>
         </li>
         <li class="nav-item">
             <a href="#" class="nav-link active">
                 <i class="bi bi-card-checklist"></i>
                 Matrícula
             </a>
         </li>
         <li class="nav-item">
             <a href="<?= URL_BASE ?>?aluno=lista" class="nav-link">
                 <i class="bi bi-person-fill"></i>
                 Aluno
             </a>
         </li>
         <li class="nav-item">

             <a href="<?= URL_BASE ?>?turma=lista" class="nav-link">
                 <i class="bi bi-people-fill"></i>
                 Turma
             </a>

         </li>
     </ul>

     <div class="logout-section">


         <?php if (isset($_SESSION['usuario'])): ?>
             <a href="<?= URL_BASE ?>?usuario=logout" class="nav-link">

                 <i class="bi bi-box-arrow-right"></i>
                 Deslogar
             </a>
         <?php endif ?>

     </div>
 </nav>