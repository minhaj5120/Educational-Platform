<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <!-- Include Bootstrap CSS from a CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: skyblue;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 25px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin: 80px auto;
            max-width: 600px;
        }
    </style>
</head>
    <section class="content">
        <div class="container-fluid">
            <div class ="row">
                <!-- left colum -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <h1 class="text-center">My Account</h1>
                        <form method="POST" action="">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="name">First Name <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{$getRecord->name}}" name="name" required >
                                </div>

                                <div class="col-md-6">
                                    <label for="last_name">Last Name <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{$getRecord->last_name}}" name="last_name" required pl>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Email <span style="color: red;">*</span></label>
                                    <input type="email" class="form-control"  value="{{$getRecord->email}}" name="email" require>
            
                                
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="number">Mobile Number<span style="color: red;">*</span></label>
                                    <input type="number" class="form-control"  value="{{$getRecord->number}}" name="number" required placeh>
                                </div>    
                                <div class="form-group col-md-6">
                                    <label>Date of Birth <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" value="{{$getRecord->date_of_birth}}" name="date_of_birth">
        
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Blood Group <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{$getRecord->blood_group}}" name="blood_group" required plac>
        
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Height <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{$getRecord->height}}" name="height" required>
        
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Weight <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{$getRecord->weight}}" name="weight" required>
        
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="Submit">Update</button>

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
        



