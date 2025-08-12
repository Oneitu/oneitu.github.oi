<?php 
require_once 'config.php';
require_once 'functions.php';
redirectIfNotAuthorized(['admin']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects - Course Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --danger: #f72585;
            --warning: #f8961e;
            --info: #4895ef;
            --light: #f8f9fa;
            --dark: #212529;
            --text-light: #ffffff;
            --text-medium: #6c757d;
            --text-dark: #212529;
            --radius: 8px;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-hover: 0 8px 15px rgba(0, 0, 0, 0.15);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: var(--text-dark);
        }

        .dashboard-container {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
        }

        /* Sidebar Styles (same as dashboard.php) */
        .sidebar {
            background: white;
            box-shadow: var(--shadow);
            padding: 20px 0;
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .logo {
            padding: 0 20px 20px;
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
        }

        .logo h2 {
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo h2 i {
            font-size: 1.5rem;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 20px 20px;
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .user-info h4 {
            font-size: 0.9rem;
            margin-bottom: 3px;
        }

        .user-info p {
            font-size: 0.8rem;
            color: var(--text-medium);
        }

        .nav-menu {
            padding: 0 10px;
        }

        .nav-item {
            margin-bottom: 5px;
        }

        .nav-item a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 15px;
            color: var(--text-medium);
            text-decoration: none;
            border-radius: var(--radius);
            transition: var(--transition);
        }

        .nav-item a:hover, .nav-item a.active {
            background: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }

        .nav-item a i {
            width: 20px;
            text-align: center;
        }

        /* Main Content Styles */
        .main-content {
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 1.8rem;
            color: var(--dark);
        }

        .user-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: var(--radius);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #e5177a;
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }

        /* Subjects Grid */
        .announcement-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            padding: 30px;
            max-width: 1500px;
            margin: 0 auto;
        }

        .announcement-card {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            transition: var(--transition);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
        }

        .announcement-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-hover);
        }

        /* Card Header - Base Styles */
        .card-header {
            display: flex;
            align-items: center;
            padding: 25px 20px;
            color: var(--text-light);
            position: relative;
            overflow: hidden;
            min-height: 160px;
        }

        .card-header::before {
            content: "";
            position: absolute;
            top: -50px;
            right: -50px;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            transition: var(--transition);
        }

        .card-header::after {
            content: "";
            position: absolute;
            bottom: -40px;
            right: -40px;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            transition: var(--transition);
        }

        .announcement-card:hover .card-header::before {
            transform: scale(1.2);
            opacity: 0.8;
        }

        .announcement-card:hover .card-header::after {
            transform: scale(1.1);
        }

        /* Floating Elements */
        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transition: var(--transition);
        }

        .circle-1 {
            width: 80px;
            height: 80px;
            top: -20px;
            left: -20px;
        }

        .circle-2 {
            width: 60px;
            height: 60px;
            bottom: -30px;
            right: -10px;
        }

        .floating-diamond {
            position: absolute;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.15);
            transform: rotate(45deg);
            top: 40px;
            right: 30px;
            transition: var(--transition);
        }

        .floating-triangle {
            position: absolute;
            width: 0;
            height: 0;
            border-left: 25px solid transparent;
            border-right: 25px solid transparent;
            border-bottom: 50px solid rgba(255, 255, 255, 0.15);
            top: -10px;
            right: 20px;
            transform: rotate(20deg);
            transition: var(--transition);
        }

        .floating-square {
            position: absolute;
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.15);
            bottom: 20px;
            left: 20px;
            transition: var(--transition);
        }

        .floating-hexagon {
            position: absolute;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.15);
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
            top: 30px;
            right: 40px;
            transition: var(--transition);
        }

        .announcement-card:hover .floating-circle,
        .announcement-card:hover .floating-diamond,
        .announcement-card:hover .floating-triangle,
        .announcement-card:hover .floating-square,
        .announcement-card:hover .floating-hexagon {
            transform: translateY(-10px) rotate(10deg);
        }

        /* Icon Container */
        .icon-container {
            margin-right: 15px;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .icon-container i {
            background: rgba(255, 255, 255, 0.156);
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: var(--transition);
        }

        .announcement-card:hover .icon-container i {
            transform: translateY(-5px) rotate(5deg) scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        }

        .header-text {
            flex: 1;
            position: relative;
            z-index: 2;
        }

        .announcement-type {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            opacity: 0.9;
            margin-bottom: 5px;
            font-weight: 700;
        }

        .announcement-title {
            font-size: 1.2rem;
            font-weight: 700;
            line-height: 1.3;
        }

        /* Course Content */
        .course-content {
            padding: 20px;
            color: var(--text-medium);
            flex: 1;
            line-height: 1.6;
            position: relative;
        }

        .course-content::before {
            content: "";
            position: absolute;
            top: 0;
            left: 20px;
            right: 20px;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(0, 0, 0, 0.1), transparent);
        }

        .course-details {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
        }

        .detail-item i {
            color: var(--text-medium);
            width: 20px;
            text-align: center;
        }

        /* Card Footer */
        .card-footer {
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            border-top: solid 1px #b9b9b939;
        }

        .card-footer a {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            transition: var(--transition);
            gap: 6px;
            border: 2px solid transparent;
        }

        .card-footer a i {
            font-size: 0.9rem;
        }

        .card-footer a:hover {
            transform: translateY(-2px);
        }

        /* Color Variants */
        .big-data {
            background: linear-gradient(135deg, #4361ee, #3f37c9);
        }

        .capstone {
            background: linear-gradient(135deg, #f72585, #b5179e);
        }

        .elective {
            background: linear-gradient(135deg, #4cc9f0, #4895ef);
        }

        .practicum {
            background: linear-gradient(135deg, #f8961e, #f3722c);
        }

        .networking {
            background: linear-gradient(135deg, #43aa8b, #4d908e);
        }

        .programming {
            background: linear-gradient(135deg, #577590, #277da1);
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow-hover);
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            animation: modalFadeIn 0.3s ease;
        }

        @keyframes modalFadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .modal-header {
            padding: 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            font-size: 1.3rem;
            color: var(--dark);
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-medium);
            transition: var(--transition);
        }

        .modal-close:hover {
            color: var(--danger);
            transform: rotate(90deg);
        }

        .modal-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: var(--radius);
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }

        .modal-footer {
            padding: 20px;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-columns: 1fr;
            }
            
            .sidebar {
                height: auto;
                position: relative;
            }
            
            .main-content {
                padding: 20px;
            }
            
            .announcement-grid {
                grid-template-columns: 1fr;
                padding: 15px;
                gap: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar (same as dashboard.php) -->
        <div class="sidebar">
            <div class="logo">
                <h2><i class="fas fa-graduation-cap"></i> CMS</h2>
            </div>
            
            <div class="user-profile">
                <div class="user-avatar"><?= strtoupper(substr($_SESSION['full_name'], 0, 1)) ?></div>
                <div class="user-info">
                    <h4><?= $_SESSION['full_name'] ?></h4>
                    <p><?= ucfirst($_SESSION['role']) ?></p>
                </div>
            </div>
            
            <div class="nav-menu">
                <div class="nav-item">
                    <a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a>
                </div>
                <div class="nav-item">
                    <a href="subjects.php" class="active"><i class="fas fa-book"></i> Subjects</a>
                </div>
                <div class="nav-item">
                    <a href="users.php"><i class="fas fa-users"></i> Users</a>
                </div>
                <div class="nav-item">
                    <a href="profile.php"><i class="fas fa-user"></i> Profile</a>
                </div>
                <div class="nav-item">
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>Subjects Management</h1>
                <div class="user-actions">
                    <button class="btn btn-primary" onclick="openAddSubjectModal()">
                        <i class="fas fa-plus"></i> Add Subject
                    </button>
                </div>
            </div>
            
            <!-- Subjects Grid -->
            <div class="announcement-grid">
                <?php
                $subjects = getAllSubjects();
                $categoryClasses = [
                    'IT Major Subject' => 'big-data',
                    'Senior Requirement' => 'capstone',
                    'Elective Course' => 'elective',
                    'Professional Training' => 'practicum',
                    'Networking' => 'networking',
                    'Programming' => 'programming'
                ];
                
                $categoryIcons = [
                    'IT Major Subject' => 'fa-database',
                    'Senior Requirement' => 'fa-project-diagram',
                    'Elective Course' => 'fa-laptop-code',
                    'Professional Training' => 'fa-briefcase',
                    'Networking' => 'fa-network-wired',
                    'Programming' => 'fa-code'
                ];
                
                foreach ($subjects as $subject): 
                    $categoryClass = $categoryClasses[$subject['category']] ?? 'big-data';
                    $categoryIcon = $categoryIcons[$subject['category']] ?? 'fa-book';
                ?>
                <div class="announcement-card course-card">
                    <div class="card-header <?= $categoryClass ?>">
                        <div class="floating-elements">
                            <div class="floating-circle circle-1"></div>
                            <div class="floating-circle circle-2"></div>
                            <div class="floating-diamond"></div>
                        </div>
                        <div class="icon-container">
                            <i class="fas <?= $categoryIcon ?>"></i>
                        </div>
                        <div class="header-text">
                            <div class="announcement-type"><?= $subject['category'] ?></div>
                            <div class="announcement-title"><?= $subject['title'] ?></div>
                        </div>
                    </div>
                    <div class="course-content">
                        <div class="course-details">
                            <div class="detail-item">
                                <i class="fas fa-hashtag"></i>
                                <span><?= $subject['code'] ?></span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-user-tie"></i>
                                <span><?= $subject['professor_name'] ?? 'Not assigned' ?></span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-clock"></i>
                                <span><?= $subject['schedule'] ?></span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span><?= $subject['room'] ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer <?= $categoryClass ?>">
                        <a href="#" onclick="openEditSubjectModal(<?= htmlspecialchars(json_encode($subject), ENT_QUOTES, 'UTF-8') ?>)">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="#" onclick="confirmDeleteSubject(<?= $subject['id'] ?>, '<?= $subject['title'] ?>')" style="color: white; background: rgba(0,0,0,0.2);">
                            <i class="fas fa-trash"></i> Delete
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    <!-- Add Subject Modal -->
    <div id="addSubjectModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add New Subject</h3>
                <button class="modal-close" onclick="closeModal('addSubjectModal')">&times;</button>
            </div>
            <form id="addSubjectForm" action="process_subject.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="action" value="add">
                    
                    <div class="form-group">
                        <label for="subjectCode">Subject Code</label>
                        <input type="text" id="subjectCode" name="code" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="subjectTitle">Subject Title</label>
                        <input type="text" id="subjectTitle" name="title" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="subjectCategory">Category</label>
                        <select id="subjectCategory" name="category" class="form-control" required>
                            <option value="">Select Category</option>
                            <option value="IT Major Subject">IT Major Subject</option>
                            <option value="Senior Requirement">Senior Requirement</option>
                            <option value="Elective Course">Elective Course</option>
                            <option value="Professional Training">Professional Training</option>
                            <option value="Networking">Networking</option>
                            <option value="Programming">Programming</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="subjectDescription">Description</label>
                        <textarea id="subjectDescription" name="description" class="form-control" rows="3"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="subjectProfessor">Professor</label>
                        <select id="subjectProfessor" name="professor_id" class="form-control">
                            <option value="">Select Professor</option>
                            <?php 
                            $instructors = getInstructors();
                            foreach ($instructors as $instructor): 
                            ?>
                            <option value="<?= $instructor['id'] ?>"><?= $instructor['full_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="subjectSchedule">Schedule</label>
                        <input type="text" id="subjectSchedule" name="schedule" class="form-control" required placeholder="e.g. MWF 1:00-2:30 PM">
                    </div>
                    
                    <div class="form-group">
                        <label for="subjectRoom">Room</label>
                        <input type="text" id="subjectRoom" name="room" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="closeModal('addSubjectModal')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Subject</button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Edit Subject Modal -->
    <div id="editSubjectModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit Subject</h3>
                <button class="modal-close" onclick="closeModal('editSubjectModal')">&times;</button>
            </div>
            <form id="editSubjectForm" action="process_subject.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" id="editSubjectId" name="id">
                    
                    <div class="form-group">
                        <label for="editSubjectCode">Subject Code</label>
                        <input type="text" id="editSubjectCode" name="code" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="editSubjectTitle">Subject Title</label>
                        <input type="text" id="editSubjectTitle" name="title" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="editSubjectCategory">Category</label>
                        <select id="editSubjectCategory" name="category" class="form-control" required>
                            <option value="">Select Category</option>
                            <option value="IT Major Subject">IT Major Subject</option>
                            <option value="Senior Requirement">Senior Requirement</option>
                            <option value="Elective Course">Elective Course</option>
                            <option value="Professional Training">Professional Training</option>
                            <option value="Networking">Networking</option>
                            <option value="Programming">Programming</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="editSubjectDescription">Description</label>
                        <textarea id="editSubjectDescription" name="description" class="form-control" rows="3"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="editSubjectProfessor">Professor</label>
                        <select id="editSubjectProfessor" name="professor_id" class="form-control">
                            <option value="">Select Professor</option>
                            <?php 
                            foreach ($instructors as $instructor): 
                            ?>
                            <option value="<?= $instructor['id'] ?>"><?= $instructor['full_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="editSubjectSchedule">Schedule</label>
                        <input type="text" id="editSubjectSchedule" name="schedule" class="form-control" required placeholder="e.g. MWF 1:00-2:30 PM">
                    </div>
                    
                    <div class="form-group">
                        <label for="editSubjectRoom">Room</label>
                        <input type="text" id="editSubjectRoom" name="room" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="closeModal('editSubjectModal')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Subject</button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        // Modal Functions
        function openAddSubjectModal() {
            document.getElementById('addSubjectModal').style.display = 'flex';
            document.getElementById('subjectCode').focus();
        }
        
        function openEditSubjectModal(subject) {
            document.getElementById('editSubjectId').value = subject.id;
            document.getElementById('editSubjectCode').value = subject.code;
            document.getElementById('editSubjectTitle').value = subject.title;
            document.getElementById('editSubjectCategory').value = subject.category;
            document.getElementById('editSubjectDescription').value = subject.description || '';
            document.getElementById('editSubjectProfessor').value = subject.professor_id || '';
            document.getElementById('editSubjectSchedule').value = subject.schedule;
            document.getElementById('editSubjectRoom').value = subject.room;
            
            document.getElementById('editSubjectModal').style.display = 'flex';
        }
        
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }
        
        function confirmDeleteSubject(id, title) {
            if (confirm(`Are you sure you want to delete "${title}"? This action cannot be undone.`)) {
                window.location.href = `process_subject.php?action=delete&id=${id}`;
            }
        }
        
        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.className === 'modal') {
                event.target.style.display = 'none';
            }
        }
    </script>
</body>
</html>