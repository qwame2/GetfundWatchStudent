<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration | Face Recognition System</title>
    
    <!-- Modern Typography: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --secondary: #10b981;
            --background: #f8fafc;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --card-bg: rgba(255, 255, 255, 0.9);
            --border-radius: 1.25rem;
            --input-focus: rgba(79, 70, 229, 0.1);
        }

        body {
            background: linear-gradient(135deg, #f8fafc 0%, #eff6ff 100%);
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            align-items: center;
            overflow-x: hidden;
        }

        .page-wrapper {
            width: 100%;
            padding: 3rem 1rem;
        }

        .registration-card {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: var(--border-radius);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .header-section {
            background: linear-gradient(to right, #4f46e5, #6366f1);
            padding: 2.5rem 2rem;
            color: white;
            text-align: center;
        }

        .header-section h2 {
            font-weight: 800;
            letter-spacing: -0.025em;
            margin-bottom: 0.5rem;
        }

        .header-section p {
            opacity: 0.9;
            font-weight: 400;
            font-size: 0.95rem;
        }

        .form-content {
            padding: 2.5rem;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--text-main);
            margin-bottom: 0.5rem;
        }

        .form-control, .form-select {
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            border: 1px solid #e2e8f0;
            background-color: #fbfcfd;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--input-focus);
            background-color: white;
        }

        .input-group-text {
            background-color: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 0.75rem 0 0 0.75rem;
            color: var(--text-muted);
        }

        .input-group .form-control {
            border-radius: 0 0.75rem 0.75rem 0;
        }

        /* Modern File Upload Wrapper */
        .file-upload-wrapper {
            border: 2px dashed #e2e8f0;
            border-radius: 1rem;
            padding: 2rem;
            text-align: center;
            background: #f8fafc;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .file-upload-wrapper:hover {
            border-color: var(--primary);
            background: #f1f5f9;
        }

        .file-upload-wrapper i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
            display: block;
        }

        .file-upload-wrapper input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        #imagePreview {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 1rem;
            border: 3px solid white;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            display: none;
        }

        .btn-register {
            background: linear-gradient(to right, var(--primary), #6366f1);
            border: none;
            color: white;
            padding: 1rem;
            border-radius: 0.75rem;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3);
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(79, 70, 229, 0.4);
            color: white;
        }

        .btn-register:active {
            transform: translateY(0);
        }

        /* Success/Error Alerts */
        .alert {
            border-radius: 0.75rem;
            border: none;
            padding: 1rem;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .alert-success {
            background-color: #ecfdf5;
            color: #065f46;
        }

        .alert-danger {
            background-color: #fef2f2;
            color: #991b1b;
        }

        /* Animation */
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-up {
            animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .footer-text {
            color: var(--text-muted);
            font-size: 0.85rem;
            text-align: center;
            margin-top: 2rem;
        }

        .required-star {
            color: #ef4444;
            margin-left: 2px;
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="registration-card animate-up">
                        <div class="header-section">
                            <h2>Student Registration</h2>
                            <p>Register new profiles for the Face Recognition Identification System</p>
                        </div>

                        <div class="form-content">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                                        <div>{{ session('success') }}</div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                                        <div>{{ session('error') }}</div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row g-4">
                                    <!-- Full Name -->
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">Full Name <span class="required-star">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                            <input type="text" class="form-control" id="name" name="name" required 
                                                   value="{{ old('name') }}" placeholder="John Doe">
                                        </div>
                                        @error('name')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Room & Index -->
                                    <div class="col-md-6">
                                        <label for="room_num" class="form-label">Room Number <span class="required-star">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-door-open"></i></span>
                                            <input type="text" class="form-control" id="room_num" name="room_num" required 
                                                   value="{{ old('room_num') }}" placeholder="E.g. 104">
                                        </div>
                                        @error('room_num')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="index_num" class="form-label">Index Number <span class="required-star">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-hash"></i></span>
                                            <input type="text" class="form-control" id="index_num" name="index_num" required 
                                                   value="{{ old('index_num') }}" placeholder="12345678">
                                        </div>
                                        @error('index_num')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Receipt & Hall -->
                                    <div class="col-md-6">
                                        <label for="receipt_num" class="form-label">Receipt Number <span class="required-star">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-receipt"></i></span>
                                            <input type="text" class="form-control" id="receipt_num" name="receipt_num" required 
                                                   value="{{ old('receipt_num') }}" placeholder="REC-9923">
                                        </div>
                                        @error('receipt_num')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="hall_name" class="form-label">Hall Name <span class="required-star">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-house-door"></i></span>
                                            <select class="form-select" id="hall_name" name="hall_name" required>
                                                <option value="">Choose Hall...</option>
                                                <option value="GETFUND HALL" {{ old('hall_name') == 'GETFUND HALL' ? 'selected' : '' }}>GETFUND HALL</option>
                                                <option value="OTI BOATENG" {{ old('hall_name') == 'OTI BOATENG' ? 'selected' : '' }}>OTI BOATENG</option>
                                                <option value="GEORGE AFRANE" {{ old('hall_name') == 'GEORGE AFRANE' ? 'selected' : '' }}>GEORGE AFRANE</option>
                                                <option value="J.B DANQUAH" {{ old('hall_name') == 'J.B DANQUAH' ? 'selected' : '' }}>J.B DANQUAH</option>
                                                <option value="REYNOLD OKAI" {{ old('hall_name') == 'REYNOLD OKAI' ? 'selected' : '' }}>REYNOLD OKAI</option>
                                                <option value="SOUTH HALL" {{ old('hall_name') == 'SOUTH HALL' ? 'selected' : '' }}>SOUTH HALL</option>
                                            </select>
                                        </div>
                                        @error('hall_name')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Student Photo -->
                                    <div class="col-md-12">
                                        <label class="form-label">Student Photo <span class="required-star">*</span></label>
                                        <div class="file-upload-wrapper" id="uploadArea">
                                            <div id="previewContainer" style="display: none;">
                                                <img id="imagePreview" src="#" alt="Preview">
                                                <p class="mt-3 text-primary small fw-semibold">Click to change photo</p>
                                            </div>
                                            <div id="uploadPrompt">
                                                <i class="bi bi-cloud-arrow-up"></i>
                                                <h6 class="fw-bold">Upload frontal face photo</h6>
                                                <p class="text-muted small">Supports JPEG, PNG, JPG (Max 2MB)</p>
                                            </div>
                                            <input type="file" id="student_image" name="student_image" 
                                                   accept="image/jpeg,image/png,image/jpg" required>
                                        </div>
                                        @error('student_image')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-md-12 mt-4">
                                        <button type="submit" class="btn btn-register w-100">
                                            <i class="bi bi-person-plus-fill me-2"></i> Register Student Profile
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="footer-text">
                        <p>© {{ date('Y') }} Student Registration System. Powered by GetfundWatch.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Enhanced Image preview functionality
        const fileInput = document.getElementById('student_image');
        const uploadArea = document.getElementById('uploadArea');
        const uploadPrompt = document.getElementById('uploadPrompt');
        const previewContainer = document.getElementById('previewContainer');
        const preview = document.getElementById('imagePreview');

        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    uploadPrompt.style.display = 'none';
                    previewContainer.style.display = 'block';
                    uploadArea.style.borderColor = 'var(--secondary)';
                    uploadArea.style.background = '#f0fdf4';
                }
                
                reader.readAsDataURL(file);
            } else {
                resetPreview();
            }
        });

        function resetPreview() {
            preview.style.display = 'none';
            uploadPrompt.style.display = 'block';
            previewContainer.style.display = 'none';
            uploadArea.style.borderColor = '#e2e8f0';
            uploadArea.style.background = '#f8fafc';
        }

        // Form validation feedback
        document.querySelector('form').addEventListener('submit', function(e) {
            const inputs = this.querySelectorAll('input[required], select[required]');
            let valid = true;
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    valid = false;
                    input.parentElement.closest('.col-md-6, .col-md-12').querySelector('.form-control, .form-select, .file-upload-wrapper').classList.add('border-danger');
                } else {
                    input.parentElement.closest('.col-md-6, .col-md-12').querySelector('.form-control, .form-select, .file-upload-wrapper').classList.remove('border-danger');
                }
            });
            
            if (!valid) {
                e.preventDefault();
                // We could add a more sophisticated toast here
            }
        });
    </script>
</body>
</html>
>