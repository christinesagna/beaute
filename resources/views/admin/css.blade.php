<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin Panel Moderne</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="all,follow">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="admin/vendor/bootstrap/css/bootstrap.min.css">
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="admin/vendor/font-awesome/css/font-awesome.min.css">
<!-- Custom Font Icons CSS -->
<link rel="stylesheet" href="admin/css/font.css">
<!-- Google fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap">

<!-- Custom Modern Styles -->
<style>
:root {
    --primary-color: #667eea;
    
    --dark-bg: #1a1d29;
    --sidebar-bg: #242938;
    --card-bg: #ffffff;
    --text-primary: #2d3748;
    --text-secondary: #718096;
    --border-color: #e2e8f0;
    --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    
    min-height: 100vh;
    color: var(--text-primary);
}

.main-wrapper {
    display: flex;
    min-height: 100vh;
}

/* Sidebar moderne */
.modern-sidebar {
    width: 280px;
    background: var(--sidebar-bg);
    position: fixed;
    height: 100vh;
    left: 0;
    top: 0;
    z-index: 1000;
    transition: all 0.3s ease;
    overflow-y: auto;
    box-shadow: var(--shadow-lg);
}

.sidebar-header {
    padding: 2rem 1.5rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    text-align: center;
}

.sidebar-header .brand {
    color: white;
    font-size: 1.5rem;
    font-weight: 700;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.sidebar-header .brand i {
    font-size: 2rem;
    color: var(--accent-color);
}

.sidebar-nav {
    padding: 1rem 0;
}

.nav-item {
    margin: 0.25rem 1rem;
}

.nav-link {
    display: flex;
    align-items: center;
    padding: 0.875rem 1rem;
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.nav-link:hover {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    transform: translateX(5px);
}

.nav-link.active {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    box-shadow: var(--shadow);
}

.nav-link i {
    width: 1.5rem;
    margin-right: 0.75rem;
    font-size: 1.1rem;
}

.nav-link::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 3px;
    background: var(--accent-color);
    transform: scaleY(0);
    transition: transform 0.3s ease;
}

.nav-link:hover::before {
    transform: scaleY(1);
}

/* Main content */
.main-content {
    flex: 1;
    margin-left: 280px;
    min-height: 100vh;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
}

.top-navbar {
    background: white;
    padding: 1rem 2rem;
    box-shadow: var(--shadow);
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: sticky;
    top: 0;
    z-index: 100;
}

.page-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text-primary);
    margin: 0;
}

.user-menu {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: 2px solid var(--primary-color);
}

.content-wrapper {
    padding: 2rem;
}

/* Cards modernes */
.modern-card {
    background: var(--card-bg);
    border-radius: 1rem;
    box-shadow: var(--shadow);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.modern-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.stat-card {
    padding: 2rem;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
}

.stat-icon {
    width: 4rem;
    height: 4rem;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    color: white;
    font-size: 1.5rem;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.stat-label {
    color: var(--text-secondary);
    font-weight: 500;
}

/* Responsive */
@media (max-width: 768px) {
    .modern-sidebar {
        transform: translateX(-100%);
    }
    
    .main-content {
        margin-left: 0;
    }
    
    .content-wrapper {
        padding: 1rem;
    }
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.fade-in-up {
    animation: fadeInUp 0.6s ease forwards;
}

/* Scrollbar personnalisée */
.modern-sidebar::-webkit-scrollbar {
    width: 6px;
}

.modern-sidebar::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
}

.modern-sidebar::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 3px;
}

.modern-sidebar::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.5);
}
</style>