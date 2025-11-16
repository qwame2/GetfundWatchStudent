<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .registration-card {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border-radius: 1rem;
            background: white;
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="registration-card p-4">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-primary">Student Registration</h2>
                        <p class="text-muted">Register new students for the face recognition system</p>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" class="form-control" id="name" name="name" required 
                                       value="{{ old('name') }}" placeholder="Enter full name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="room_num" class="form-label">Room Number *</label>
                                <input type="text" class="form-control" id="room_num" name="room_num" required 
                                       value="{{ old('room_num') }}" placeholder="Enter room number">
                                @error('room_num')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="index_num" class="form-label">Index Number *</label>
                                <input type="text" class="form-control" id="index_num" name="index_num" required 
                                       value="{{ old('index_num') }}" placeholder="Enter index number">
                                @error('index_num')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="receipt_num" class="form-label">Receipt Number *</label>
                                <input type="text" class="form-control" id="receipt_num" name="receipt_num" required 
                                       value="{{ old('receipt_num') }}" placeholder="Enter receipt number">
                                @error('receipt_num')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="hall_name" class="form-label">Hall Name *</label>
                            <select class="form-select" id="hall_name" name="hall_name" required>
                                <option value="">Select Hall</option>
                                <option value="GETFUND HALL" {{ old('hall_name') == 'GETFUND HALL' ? '' : '' }}>GETFUND HALL</option>
                                <option value="OTI BOATENG" {{ old('hall_name') == 'OTI BOATENG' ? 'selected' : '' }}>OTI BOATENG</option>
                                <option value="GEORGE AFRANE" {{ old('hall_name') == 'GEORGE AFRANE' ? 'selected' : '' }}>GEORGE AFRANE</option>
                                <option value="J.B DANQUAH" {{ old('hall_name') == 'J.B DANQUAH' ? 'selected' : '' }}>J.B DANQUAH</option>
                                <option value="REYNOLD OKAI" {{ old('hall_name') == 'REYNOLD OKAI' ? 'selected' : '' }}>REYNOLD OKAI</option>
                                <option value="SOUTH HALL" {{ old('hall_name') == 'SOUTH HALL' ? 'selected' : '' }}>SOUTH HALL</option>
                            </select>
                            @error('hall_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="student_image" class="form-label">Student Photo *</label>
                            <input type="file" class="form-control" id="student_image" name="student_image" 
                                   accept="image/jpeg,image/png,image/jpg" required>
                            <div class="form-text">Upload a clear frontal face photo (JPEG, PNG, JPG, max 2MB)</div>
                            @error('student_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            
                            <div class="mt-2">
                                <img id="imagePreview" src="#" alt="Image preview" 
                                     class="img-fluid rounded mt-2" style="max-height: 200px; display: none;">
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-person-plus-fill"></i> Register Student
                            </button>
                        </div>
                    </form>
                </div>

                <div class="text-center mt-4">
                    <p class="text-muted">© {{ date('Y') }} Student Registration System. All rights reserved.</p>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Image preview functionality
        document.getElementById('student_image').addEventListener('change', function(e) {
            const preview = document.getElementById('imagePreview');
            const file = e.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const inputs = this.querySelectorAll('input[required], select[required]');
            let valid = true;
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    valid = false;
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });
            
            if (!valid) {
                e.preventDefault();
                alert('Please fill in all required fields.');
            }
        });
    </script>
</body>
</html>