<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Management System</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="split-container">
        <!-- Left Side - System Title -->
        <div class="system-side">
            <div class="system-content">
                <div class="floating-learning-elements">
  <!-- Floating Books -->
  <div class="floating-book book-1">
    <div class="book-cover" style="background: linear-gradient(135deg, #4361ee, #3a0ca3);">
      <span class="book-title">LMS Guide</span>
    </div>
    <div class="book-spine"></div>
    <div class="book-pages"></div>
  </div>
  
  <div class="floating-book book-2">
    <div class="book-cover" style="background: linear-gradient(135deg, #4cc9f0, #4895ef);">
      <span class="book-title">Course 101</span>
    </div>
    <div class="book-spine"></div>
    <div class="book-pages"></div>
  </div>
  
  <!-- Floating Papers -->
  <div class="floating-paper paper-1">
    <div class="paper-content">
      <div class="lined-paper"></div>
      <div class="handwritten-note">Important notes...</div>
    </div>
  </div>
  
  <div class="floating-paper paper-2">
    <div class="paper-content">
      <div class="grid-paper"></div>
      <div class="diagram">x² + y² = r²</div>
    </div>
  </div>
  
  <!-- Floating Pens -->
  <div class="floating-pen pen-1">
    <div class="pen-cap"></div>
    <div class="pen-body"></div>
    <div class="pen-tip"></div>
    <div class="pen-clip"></div>
  </div>
  
  <div class="floating-pen pen-2">
    <div class="pen-cap"></div>
    <div class="pen-body"></div>
    <div class="pen-tip"></div>
    <div class="pen-clip"></div>
  </div>
  
  <!-- Subtle decorative elements -->
  <div class="floating-circle circle-1"></div>
  <div class="floating-circle circle-2"></div>
</div>
                
                <div class="title-container">
                    <h1 class="system-title animate-title">
                        <span class="title-word title-word-1">School</span>
                        <br>
                        <span class="title-word title-word-2">Management</span>
                        <span class="title-word title-word-3">System</span>
                    </h1>
                </div>
            </div>
        </div>
        
        <!-- Right Side - Login Form -->
        <div class="login-side">
            <div class="login-container">
                <center>
                    <img src="/student/img/Picsart_25-08-05_19-06-38-404.png" alt="" style="width: 180px;">
                </center>
                 <div class="error-message hidden animate-shake">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>Invalid username or password</span>
                    </div>
                    <br>
                
                <form id="loginForm" class="form-group">
                    <div class="input-group animate-slide-in-left">
                        <input type="text" id="username" required>
                        <label for="username">Username</label>
                        <i class="fas fa-user input-icon"></i>
                    </div>
                    
                    <div class="input-group animate-slide-in-right">
                        <input type="password" id="password" required>
                        <label for="password">Password</label>
                        <button type="button" class="toggle-password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    
                    <div class="remember-forgot animate-fade-in">
                        <a href="/student/index.php" class="forgot-password">Forgot password?</a>
                    </div>
                    
                    <button type="submit" class="login-btn animate-pop-delay">
                        <span class="btn-text">Login</span>
                        <div class="btn-loader hidden">
                            <div class="loader-dot"></div>
                            <div class="loader-dot"></div>
                            <div class="loader-dot"></div>
                        </div>
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Welcome Container (hidden initially) -->
        <div class="welcome-container hidden">
            <div class="welcome-content">
                <div class="success-check animate-check">
                    <svg viewBox="0 0 52 52">
                        <circle class="success-circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="success-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                    </svg>
                </div>
                <h1 class="welcome-title">Login Successful!</h1>
                <p class="welcome-text">Redirecting to your dashboard...</p>
                <div class="loading-bar">
                    <div class="loading-progress"></div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="script.js"></script>
</body>
</html>