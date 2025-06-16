@extends('layouts.app')

@section('content')

<style>
    /* Custom styles for landing page */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .hero-section {
        padding-top: 7rem;
        padding-bottom: 7rem;
    }
    
    .feature-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }
    
    /* Bootstrap overrides */
    .btn {
        border-radius: 0.5rem;
        font-weight: 500;
    }
    
    .card {
        border-radius: 0.75rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }
</style>

<!-- Add Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<!-- Hero Section -->
<section class="hero-section py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Build Amazing Applications Faster</h1>
                <p class="lead mb-4">Our platform helps developers create robust web applications in record time with Laravel's powerful framework.</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('register') }}" class="btn btn-light btn-lg px-4">Get Started</a>
                    <a href="#features" class="btn btn-outline-light btn-lg px-4">Learn More</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo" class="img-fluid" width="400">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Powerful Features</h2>
            <p class="text-muted lead">Everything you need to build modern web applications</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="feature-icon bg-primary bg-opacity-10 text-primary rounded-circle mb-4" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-lightning-charge fs-3"></i>
                        </div>
                        <h4 class="fw-bold">Rapid Development</h4>
                        <p class="text-muted">Build applications faster with Laravel's elegant syntax and powerful tools.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="feature-icon bg-success bg-opacity-10 text-success rounded-circle mb-4" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-shield-lock fs-3"></i>
                        </div>
                        <h4 class="fw-bold">Secure Authentication</h4>
                        <p class="text-muted">Built-in user authentication with secure password hashing and protection.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="feature-icon bg-info bg-opacity-10 text-info rounded-circle mb-4" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-phone fs-3"></i>
                        </div>
                        <h4 class="fw-bold">Responsive Design</h4>
                        <p class="text-muted">Looks great on all devices with our mobile-first responsive approach.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold mb-4">Ready to get started?</h2>
                <p class="lead mb-4">Join thousands of developers building amazing applications with our platform.</p>
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-5">Create Free Account</a>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">What Our Users Say</h2>
            <p class="text-muted lead">Trusted by developers worldwide</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" class="rounded-circle me-3" width="50" alt="User">
                            <div>
                                <h5 class="mb-0">Sarah Johnson</h5>
                                <small class="text-muted">Full Stack Developer</small>
                            </div>
                        </div>
                        <p class="mb-0">"This platform reduced our development time by 40%. The authentication system saved us weeks of work!"</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg" class="rounded-circle me-3" width="50" alt="User">
                            <div>
                                <h5 class="mb-0">Michael Chen</h5>
                                <small class="text-muted">CTO, TechStart</small>
                            </div>
                        </div>
                        <p class="mb-0">"The clean design and responsive layout made it easy for our team to build a product our customers love."</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" class="rounded-circle me-3" width="50" alt="User">
                            <div>
                                <h5 class="mb-0">Emma Rodriguez</h5>
                                <small class="text-muted">Product Manager</small>
                            </div>
                        </div>
                        <p class="mb-0">"We deployed our MVP in record time thanks to this platform's built-in features and documentation."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="py-5 bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h5 class="fw-bold mb-3">Laravel Auth</h5>
                <p class="text-muted">Building better web applications with Laravel's powerful framework.</p>
            </div>
            <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                <h5 class="fw-bold mb-3">Product</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Features</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Pricing</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Documentation</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                <h5 class="fw-bold mb-3">Company</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">About</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Careers</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h5 class="fw-bold mb-3">Subscribe to our newsletter</h5>
                <form class="mb-3">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Your email">
                        <button class="btn btn-primary" type="button">Subscribe</button>
                    </div>
                </form>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white"><i class="bi bi-twitter fs-5"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-github fs-5"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-linkedin fs-5"></i></a>
                </div>
            </div>
        </div>
        <hr class="my-4 bg-secondary">
        <div class="text-center text-muted">
            <small>© {{ date('Y') }} Laravel Auth. All rights reserved.</small>
        </div>
    </div>
</footer>
@endsection