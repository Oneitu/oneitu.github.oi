
document.addEventListener('DOMContentLoaded', function() {
    // DOM Elements
    const addAnnouncementBtn = document.getElementById('addAnnouncementBtn');
    const announcementModal = document.getElementById('announcementModal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const announcementForm = document.getElementById('announcementForm');
    const announcementContainer = document.getElementById('announcementContainer');
    const confirmModal = document.getElementById('confirmModal');
    const closeConfirmModalBtn = document.getElementById('closeConfirmModalBtn');
    const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    const toast = document.getElementById('toast');
    const spinner = document.getElementById('spinner');

    // Variables
    let currentAnnouncementId = null;
    let isEditMode = false;

    // Event Listeners
    addAnnouncementBtn.addEventListener('click', openAddModal);
    closeModalBtn.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);
    announcementForm.addEventListener('submit', handleFormSubmit);
    closeConfirmModalBtn.addEventListener('click', closeConfirmModal);
    cancelDeleteBtn.addEventListener('click', closeConfirmModal);

    // Initial load
    loadAnnouncements();

    // Functions
    function openAddModal() {
        isEditMode = false;
        document.getElementById('modalTitle').textContent = 'Add New Announcement';
        document.getElementById('announcementId').value = '';
        announcementForm.reset();
        document.getElementById('announcement_date').valueAsDate = new Date();
        announcementModal.style.display = 'flex';
    }

    function openEditModal(id) {
        isEditMode = true;
        currentAnnouncementId = id;
        document.getElementById('modalTitle').textContent = 'Edit Announcement';
        
        showSpinner();
        fetch(`announcement.php?action=read&id=${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('announcementId').value = data.id;
                document.getElementById('title').value = data.title;
                document.getElementById('content').value = data.content;
                document.getElementById('badge_text').value = data.badge_text;
                document.getElementById('announcement_date').value = data.announcement_date;
                document.getElementById('author').value = data.author;
                announcementModal.style.display = 'flex';
                hideSpinner();
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Failed to load announcement', 'error');
                hideSpinner();
            });
    }

    function closeModal() {
        announcementModal.style.display = 'none';
    }

    function openConfirmModal(id) {
        currentAnnouncementId = id;
        confirmModal.style.display = 'flex';
    }

    function closeConfirmModal() {
        confirmModal.style.display = 'none';
    }

    function handleFormSubmit(e) {
        e.preventDefault();
        
        const announcementData = {
            title: document.getElementById('title').value,
            content: document.getElementById('content').value,
            badge_text: document.getElementById('badge_text').value,
            announcement_date: document.getElementById('announcement_date').value,
            author: document.getElementById('author').value
        };

        if (isEditMode) {
            announcementData.id = currentAnnouncementId;
            updateAnnouncement(announcementData);
        } else {
            createAnnouncement(announcementData);
        }
    }

    function loadAnnouncements() {
        showSpinner();
        fetch('announcement.php?action=readAll')
            .then(response => response.json())
            .then(data => {
                announcementContainer.innerHTML = '';
                if (data.length === 0) {
                    announcementContainer.innerHTML = '<p>No announcements found.</p>';
                } else {
                    data.forEach(announcement => {
                        const announcementCard = createAnnouncementCard(announcement);
                        announcementContainer.appendChild(announcementCard);
                    });
                }
                hideSpinner();
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Failed to load announcements', 'error');
                hideSpinner();
            });
    }

    function createAnnouncementCard(announcement) {
        const card = document.createElement('div');
        card.className = 'announcement-card';
        
        // Format date
        const formattedDate = new Date(announcement.announcement_date).toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        });
        
        card.innerHTML = `
            <div class="card-badge">${announcement.badge_text}</div>
            <div class="card-content">
                <div class="card-date"><i class="far fa-calendar-alt"></i> ${formattedDate}</div>
                <h4 class="card-title">${announcement.title}</h4>
                <p class="card-text">${announcement.content}</p>
            </div>
            <div class="card-footer">
                <span class="card-author"><i class="fas fa-user"></i> ${announcement.author}</span>
                <div class="card-actions">
                    <button class="action-btn edit" data-id="${announcement.id}"><i class="fas fa-edit"></i> Edit</button>
                    <button class="action-btn delete" data-id="${announcement.id}"><i class="fas fa-trash-alt"></i> Delete</button>
                </div>
            </div>
        `;
        
        // Add event listeners to action buttons
        card.querySelector('.edit').addEventListener('click', () => openEditModal(announcement.id));
        card.querySelector('.delete').addEventListener('click', () => openConfirmModal(announcement.id));
        
        return card;
    }

    function createAnnouncement(data) {
        showSpinner();
        fetch('announcement.php?action=create', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            if (result.status === 'success') {
                showToast('Announcement created successfully', 'success');
                loadAnnouncements();
                closeModal();
            } else {
                showToast(result.message, 'error');
            }
            hideSpinner();
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('Failed to create announcement', 'error');
            hideSpinner();
        });
    }

    function updateAnnouncement(data) {
        showSpinner();
        fetch('announcement.php?action=update', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            if (result.status === 'success') {
                showToast('Announcement updated successfully', 'success');
                loadAnnouncements();
                closeModal();
            } else {
                showToast(result.message, 'error');
            }
            hideSpinner();
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('Failed to update announcement', 'error');
            hideSpinner();
        });
    }

    // Confirm delete button event listener
    confirmDeleteBtn.addEventListener('click', () => {
        showSpinner();
        fetch(`announcement.php?action=delete&id=${currentAnnouncementId}`)
            .then(response => response.json())
            .then(result => {
                if (result.status === 'success') {
                    showToast('Announcement deleted successfully', 'success');
                    loadAnnouncements();
                } else {
                    showToast(result.message, 'error');
                }
                closeConfirmModal();
                hideSpinner();
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Failed to delete announcement', 'error');
                closeConfirmModal();
                hideSpinner();
            });
    });

    function showToast(message, type) {
        const toastMessage = document.getElementById('toastMessage');
        toastMessage.textContent = message;
        
        toast.className = 'toast';
        toast.classList.add(type);
        
        toast.classList.add('show');
        
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3000);
    }

    function showSpinner() {
        spinner.style.display = 'flex';
    }

    function hideSpinner() {
        spinner.style.display = 'none';
    }
});