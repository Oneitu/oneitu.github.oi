<?php
    include "sidebar.html";
    include "topbar.php";
?>
 
            <div class="mid">
            
            <!-- Dashboard Content -->
            <div class="dashboard">
                        <!-- Activities Tab -->
                <div class="tab-content active" id="activities">
                 <div class="over">
                    <div class="lefty">
                        <h1>Activities Overview</h1>
                        <p>Track your progress through the 18-week UI Design course.</p>
                    </div>
                        <div class="nav-tabs">
                        <div class="nav-tab" data-tab="activities">Activities</div>
                        <div class="nav-tab" data-tab="virtual-class">Virtual Class</div>
                        <a href="/student/courses.php" class="nav-tab" data-tab="back" style="text-decoration: none;">Back</a>
                        </div>
                    </div>
                    
                <div class="week-dropdown">
                <buttons class="dropdown-btn" id="weekDropdownBtn" style="font-size: 14px;">
                    <span>Week 1</span>  <!-- Changed from "Select Week" to "Week 1" -->
                    <i class="fas fa-chevron-down"></i>
                </buttons>
                <div class="dropdown-content" id="weekDropdown">
                    <div class="week-item selected" data-week="1">  <!-- Added 'selected' class -->
                        <div class="week-number">w1</div>
                        <div class="week-info">
                            NO DATA
                        </div>
                    </div>
                    <div class="week-item" data-week="2">
                        <div class="week-number">w2</div>
                        <div class="week-info">
                            NO DATA
                        </div>
                    </div>
                    <div class="week-item" data-week="3">
                        <div class="week-number">w3</div>
                        <div class="week-info">
                            NO DATA
                        </div>
                    </div>
                    <div class="week-item" data-week="4">
                        <div class="week-number">w4</div>
                        <div class="week-info">
                            NO DATA
                        </div>
                    </div>
                    <div class="week-item" data-week="5">
                        <div class="week-number">w5</div>
                        <div class="week-info">
                            NO DATA
                        </div>
                    </div>
                    <div class="week-item" data-week="6">
                        <div class="week-number">w6</div>
                        <div class="week-info">
                            NO DATA
                        </div>
                    </div>
                    <div class="week-item" data-week="7">
                        <div class="week-number">w7</div>
                        <div class="week-info">
                            NO DATA
                        </div>
                    </div>
                    <div class="week-item" data-week="8">
                        <div class="week-number">w8</div>
                        <div class="week-info">
                            NO DATA
                        </div>
                    </div>
                    <div class="week-item" data-week="9">
                        <div class="week-number">w9</div>
                        <div class="week-info">
                            NO DATA
                        </div>
                    </div>
                    <div class="week-item" data-week="10">
                        <div class="week-number">w10</div>
                        <div class="week-info">
                            NO DATA
                        </div>
                    </div>
                    <div class="week-item" data-week="11">
                        <div class="week-number">w11</div>
                        <div class="week-info">
                            NO DATA
                        </div>
                    </div>
                    <div class="week-item" data-week="12">
                        <div class="week-number">w12</div>
                        <div class="week-info">
                            NO DATA
                        </div>
                    </div>
                    <div class="week-item" data-week="13">
                        <div class="week-number">w13</div>
                        <div class="week-info">
                            NO DATA
                        </div>
                    </div>
                    <div class="week-item" data-week="14">
                        <div class="week-number">w14</div>
                        <div class="week-info">
                            NO DATA
                        </div>
                    </div>
                    <div class="week-item" data-week="15">
                        <div class="week-number">w15</div>
                        <div class="week-info">
                            NO DATA
                        </div>
                    </div>
                    <div class="week-item" data-week="16">
                        <div class="week-number">w16</div>
                        <div class="week-info">
                            NO DATA
                        </div>
                    </div>
                    <div class="week-item" data-week="17">
                        <div class="week-number">w17</div>
                        <div class="week-info">
                            NO DATA
                        </div>
                    </div>
                    <div class="week-item" data-week="18">
                        <div class="week-number">w18</div>
                        <div class="week-info">
                            NO DATA
                        </div>
                    </div>
                </div>
            </div>

                    <!-- Week Content Display -->
                    <div class="week-content" id="weekContent">
                        <div class="week-header">
                            <h2 id="currentWeekTitle">Select a week to view content</h2>
                            <p id="currentWeekDesc">Click on any week from the dropdown above to see materials and activities</p>
                        </div>
                        <div class="week-materials" id="weekMaterials">
                            <!-- Content will be loaded here dynamically -->
                        </div>
                    </div>
                </div>

                <!-- Virtual Class Tab -->
                <div class="tab-content" id="virtual-class">
                    <div class="over">
                        <div class="lefty">
                        <h1>Virtual Class</h1>
                        <p>Join live sessions and access class materials.</p>
                        </div>
                        <div class="nav-tabs">
                        <div class="nav-tab active" data-tab="activities">Activities</div>
                        <div class="nav-tab" data-tab="virtual-class">Virtual Class</div>
                        <a href="/student/courses.php" class="nav-tab" data-tab="back" style="text-decoration: none;">Back</a>
                        </div>
                    </div>


                    

                    
                </div>

            </div>
            </div>
                            
<?php
    include "footer.html";
?>
    <script src="script.js"></script>
        <script>
        // Tab switching functionality
        const tabs = document.querySelectorAll('.nav-tab');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs and contents
                tabs.forEach(t => t.classList.remove('active'));
                tabContents.forEach(c => c.classList.remove('active'));
                
                // Add active class to clicked tab and corresponding content
                tab.classList.add('active');
                const tabId = tab.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });

        // Week Dropdown functionality
        const dropdownBtn = document.getElementById('weekDropdownBtn');
        const dropdownContent = document.getElementById('weekDropdown');
        const weekItems = document.querySelectorAll('.week-item');
        const weekContent = document.getElementById('weekContent');
        const weekTitle = document.getElementById('currentWeekTitle');
        const weekDesc = document.getElementById('currentWeekDesc');
        const weekMaterials = document.getElementById('weekMaterials');

        // Sample week data (in a real app, this would come from an API)
        const weeksData = {
            1: {
                title: "Week 1: No data",
                description: "No data",
                materials: [
                    {
                        title: "No data",
                        description: "No data",
                        icon: "file-alt"
                    },
                    {
                        title: "No data",
                        description: "No data",
                        icon: "download"
                    },
                    {
                        title: "No data",
                        description: "No data",
                        icon: "star"
                    },
                    {
                        title: "No data",
                        description: "No data",
                        icon: "tasks"
                    }
                ]
            },
            2: {
                title: "Week 2: No data",
                description: "No data",
                materials: [
                    {
                        title: "No data",
                        description: "No data",
                        icon: "palette"
                    },
                    {
                        title: "No data",
                        description: "No data",
                        icon: "fill-drip"
                    },
                    {
                        title: "No data",
                        description: "No data",
                        icon: "tasks"
                    }
                ]
            },
            3: {
                title: "Week 3: No data",
                description: "No data",
                materials: [
                    {
                        title: "No data",
                        description: "No data",
                        icon: "font"
                    },
                    {
                        title: "No data",
                        description: "No data",
                        icon: "text-height"
                    },
                    {
                        title: "Assignment #3",
                        description: "No data",
                        icon: "tasks"
                    }
                ]
            }
            // Additional weeks would follow the same pattern
        };

        // Toggle dropdown
        dropdownBtn.addEventListener('click', () => {
            dropdownContent.classList.toggle('active');
            dropdownBtn.classList.toggle('active');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!dropdownBtn.contains(e.target) && !dropdownContent.contains(e.target)) {
                dropdownContent.classList.remove('active');
                dropdownBtn.classList.remove('active');
            }
        });

        // Handle week selection
        weekItems.forEach(item => {
            item.addEventListener('click', () => {
                // Update UI
                weekItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
                dropdownBtn.innerHTML = `<span>Week ${item.getAttribute('data-week')}</span><i class="fas fa-chevron-down"></i>`;
                dropdownContent.classList.remove('active');
                dropdownBtn.classList.remove('active');

                // Load week content
                const weekNum = item.getAttribute('data-week');
                const weekData = weeksData[weekNum] || {
                    title: `Week ${weekNum}`,
                    description: "Content coming soon",
                    materials: []
                };

                weekTitle.textContent = weekData.title;
                weekDesc.textContent = weekData.description;

                // Generate materials
                weekMaterials.innerHTML = weekData.materials.length > 0 
                    ? weekData.materials.map(material => `
                        <div class="material-card">
                            <h4>
                                <span class="material-icon">
                                    <i class="fas fa-${material.icon}"></i>
                                </span>
                                ${material.title}
                            </h4>
                            <p>${material.description}</p>
                        </div>
                    `).join('')
                    : '<p>No materials available for this week yet.</p>';

                // Show week content if hidden
                weekContent.style.display = 'block';
            });
        });

        // Initial state - hide week content until selection
        weekContent.style.display = 'none';


        // ... existing code ...

        // Set default to Week 1 on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Find Week 1 element and trigger click
            const week1Item = document.querySelector('.week-item[data-week="1"]');
            if (week1Item) {
            week1Item.click();
            }
        });

        // ... rest of your existing JavaScript ...

                // In your existing JavaScript, modify the week selection code:
        document.addEventListener('DOMContentLoaded', function() {
            // Load Week 1 by default
            const defaultWeek = 1;
            const defaultWeekItem = document.querySelector(`.week-item[data-week="${defaultWeek}"]`);
            
            if (defaultWeekItem) {
                // Update UI
                weekItems.forEach(i => i.classList.remove('active'));
                defaultWeekItem.classList.add('active');
                dropdownBtn.innerHTML = `<span>Week ${defaultWeek}</span><i class="fas fa-chevron-down"></i>`;
                
                // Load week content
                const weekData = weeksData[defaultWeek] || {
                    title: `Week ${defaultWeek}`,
                    description: "Content coming soon",
                    materials: []
                };

                weekTitle.textContent = weekData.title;
                weekDesc.textContent = weekData.description;

                // Generate materials
                weekMaterials.innerHTML = weekData.materials.length > 0 
                    ? weekData.materials.map(material => `
                        <div class="material-card">
                            <h4>
                                <span class="material-icon">
                                    <i class="fas fa-${material.icon}"></i>
                                </span>
                                ${material.title}
                            </h4>
                            <p>${material.description}</p>
                        </div>
                    `).join('')
                    : '<p>No materials available for this week yet.</p>';

                // Show week content
                weekContent.style.display = 'block';
            }
        });
        </script>
</body>
</html>