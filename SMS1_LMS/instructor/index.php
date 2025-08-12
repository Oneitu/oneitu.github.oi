<?php
    include "sidebar.html";
    include "topbar.php";
?>

            <!-- Dashboard Content -->
            <div class="dashboard">
                <h1>Class Portal</h1>
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

            <!-- Announcements Carousel -->
            <div class="announcement-carousel-container">
                <div class="section-header">
                    <h2>Announcements</h2>
                    <div class="carousel-controls">
                        <button class="carousel-prev"><i class="fas fa-chevron-left"></i></button>
                        <span class="carousel-indicators"></span>
                        <button class="carousel-next"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
                
                    <div class="announcement-carousel">
                        <!-- Announcement Slide 1 -->
                        <div class="announcement-slide active">
                            <div class="slide-badge">New</div>
                            <div class="slide-date">Mar 15, 2023</div>
                            <h3 class="slide-title">Midterm Exam Schedule Released</h3>
                            <p class="slide-content">The schedule for midterm exams has been published. Please check your course pages for specific dates and times.</p>
                            <div class="slide-footer">
                                <span class="slide-author"><i class="fas fa-user"></i> Admin Office</span>
                                <a href="#" class="slide-link">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        
                        <!-- Announcement Slide 2 -->
                        <div class="announcement-slide">
                            <div class="slide-badge">Important</div>
                            <div class="slide-date">Mar 12, 2023</div>
                            <h3 class="slide-title">System Maintenance Tonight</h3>
                            <p class="slide-content">The LMS will be unavailable from 11 PM to 2 AM for scheduled maintenance. Please save your work.</p>
                            <div class="slide-footer">
                                <span class="slide-author"><i class="fas fa-user"></i> IT Department</span>
                                <a href="#" class="slide-link">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>

                             <!-- Announcement Slide 2 -->
                        <div class="announcement-slide">
                            <div class="slide-badge">Important</div>
                            <div class="slide-date">Mar 12, 2023</div>
                            <h3 class="slide-title">System Maintenance Tonight</h3>
                            <p class="slide-content">The LMS will be unavailable from 11 PM to 2 AM for scheduled maintenance. Please save your work.</p>
                            <div class="slide-footer">
                                <span class="slide-author"><i class="fas fa-user"></i> IT Department</span>
                                <a href="#" class="slide-link">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        
                        <!-- Announcement Slide 3 -->
                        <div class="announcement-slide">
                            <div class="slide-badge">Update</div>
                            <div class="slide-date">Mar 10, 2023</div>
                            <h3 class="slide-title">Assignment Deadline Extended</h3>
                            <p class="slide-content">The deadline for Algorithm Design assignment has been extended to March 15th due to technical issues.</p>
                            <div class="slide-footer">
                                <span class="slide-author"><i class="fas fa-user"></i> Prof. Wilson</span>
                                <a href="#" class="slide-link">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        
                        <!-- Announcement Slide 4 -->
                        <div class="announcement-slide">
                            <div class="slide-badge">Event</div>
                            <div class="slide-date">Mar 8, 2023</div>
                            <h3 class="slide-title">Guest Lecture: AI in Education</h3>
                            <p class="slide-content">Join us this Friday for a special lecture on artificial intelligence applications in modern education.</p>
                            <div class="slide-footer">
                                <span class="slide-author"><i class="fas fa-user"></i> Dr. Smith</span>
                                <a href="#" class="slide-link">Register Now <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Upcoming Deadlines -->
                <section class="deadlines-section">
                    <div class="section-header">
                        <h2>Upcoming Deadlines</h2>
                        <a href="#" class="view-all">View Calendar</a>
                    </div>
                    
                    <div class="deadlines-list">
                        <div class="deadline-item">
                            <div class="date-badge">
                                <span class="day">15</span>
                                <span class="month">SEPT</span>
                            </div>
                            <div class="deadline-info">
                                <h3>Capstone Proposal Project</h3>
                                <p>System Integration - Due in 1 Month</p>
                            </div>
                            <div class="priority high"></div>
                            <button class="btn-action">Start</button>
                        </div>
                        
                        <div class="deadline-item">
                            <div class="date-badge">
                                <span class="day">18</span>
                                <span class="month">AUG</span>
                            </div>
                            <div class="deadline-info">
                                <h3>Prelim Exam</h3>
                                <p>W6 Examination</p>
                            </div>
                            <div class="priority medium"></div>
                            <button class="btn-action">Prepare</button>
                        </div>
                        
                        <div class="deadline-item">
                            <div class="date-badge">
                                <span class="day">22</span>
                                <span class="month">AUG</span>
                            </div>
                            <div class="deadline-info">
                                <h3>OJT/ Webinar</h3>
                                <p>Starting On Day 6</p>
                            </div>
                            <div class="priority low"></div>
                            <button class="btn-action">Outline</button>
                        </div>
                    </div>
                </section>
            </div>
        
<?php
    include "footer.html";
?>

    <script src="script.js"></script>
</body>
</html>