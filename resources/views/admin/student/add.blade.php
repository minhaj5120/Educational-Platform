<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <!-- Include Bootstrap CSS from a CDN -->
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: skyblue;
        }
        .form-container {
            background-color: red;
            padding: 20px;
            border-radius: 25px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin: 80px auto;
            max-width: 600px;
        }
    </style>
</head>
    
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6" style="text-align:right">
                    <h1>Add New Student</h1>


                </div>
            </div>

        </div>
    </section>
</div>
<body>
    <section class="content">
        <div class="container-fluid">
            <div class ="row">
                <!-- left colum -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="name">First Name <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" required placeholder="First Name">
                                </div>

                                <div class="col-md-6">
                                    <label for="last_name">Last Name <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{ old('last_name') }}" name="last_name" required placeholder="Last Name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Email <span style="color: red;">*</span></label>
                                    <input type="email" class="form-control"  value="{{old('email')}}" name="email" required placeholder="Email">
            
                                
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password <span style="color: red;">*</span></label>
                                    <input type="password" class="form-control"  value="{{old('password')}}" name="password" required placeholder="Password">
                
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="number">Mobile Number<span style="color: red;">*</span></label>
                                    <input type="number" class="form-control"  value="{{old('number')}}" name="number" required placeholder="Mobile Number">
                                </div>    
                                <div class="form-group col-md-6">
                                    <label for="number">Admission Number <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{old('admission_number')}}" name="admission_number" required placeholder="Admission Number">
        
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="number">Roll Number <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{old('roll_number')}}" name="roll_number" required placeholder="Roll Number">
        
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Class <span style="color: red;">*</span></label>
                                    <select class="form-control" required name="class_id">
                                        <option value="">Select Class</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Gender <span style="color: red;">*</span></label>
                                    <select class="form-control" required name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Date of Birth <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" value="{{old('date_of_birth')}}" name="date_of_birth">
        
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Religion <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{old('religion')}}" name="religion" required placeholder="Religion">
        
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Admission Date <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" value="{{old('admission_date')}}" name="admission_date" required>
        
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Profile Picture <span style="color: red;">*</span></label>
                                    <input type="file" class="form-control" name="profile_pic" >
        
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Blood Group <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{old('blood_group')}}" name="blood_group" required placeholder="Blood Group">
        
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Height <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{old('height')}}" name="height" required placeholder="Height">
        
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Weight <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{old('weight')}}" name="weight" required placeholder="Weight">
        
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Status <span style="color: red;">*</span></label>
                                    <select class="form-control" required name="status">
                                        <option value="">Select Status</option>
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>
                                </div>
                                
                
                                


                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="Submit">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!--Include Bootstrap JS and jQuery from a CDN--> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body> 
</html>


        


