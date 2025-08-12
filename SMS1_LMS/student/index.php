<?php
    include "sidebar.html";
    include "topbar.php";
?>

            <!-- Dashboard Content -->
            <div class="dashboard">

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
                                <div class="slide-content">
                                <p>Join us this Friday for a special lecture on artificial intelligence applications in modern education.</p>
                                </div>
                            <div class="slide-footer">
                                <span class="slide-author"><i class="fas fa-user"></i> Dr. Smith</span>
                                <a href="#" class="slide-link">Register Now <i class="fas fa-arrow-right"></i></a>
                            </div>
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