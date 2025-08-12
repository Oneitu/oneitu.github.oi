<?php
    include "sidebar.html";
    include "topbar.php";
?>

            <!-- Dashboard Content -->
            <div class="dashboard">
                <h1>Module Achieved</h1>
                <br>
                <br>
              
                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="icon-box blue">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="stat-info">
                            <span class="value">4</span>
                            <span class="label">Active Courses</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress blue" style="width: 75%"></div>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="icon-box green">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <div class="stat-info">
                            <span class="value">3</span>
                            <span class="label">Pending Assignments</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress green" style="width: 60%"></div>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="icon-box orange">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-info">
                            <span class="value">2</span>
                            <span class="label">Classes Today</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress orange" style="width: 40%"></div>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="icon-box purple">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="stat-info">
                            <span class="value">87%</span>
                            <span class="label">Overall Progress</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress purple" style="width: 87%"></div>
                        </div>
                    </div>
                </div>
                
               
            </div>
        
<?php
    include "footer.html";
?>

    <script src="script.js"></script>
</body>
</html>