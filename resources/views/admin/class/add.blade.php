<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Admin</title>
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
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-container">
                    <h1 class="text-center">Assign New Admin</h1>
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" required>
        
                        </div>
                        <div class="form-group">
                            <label for="text">Created By</label>
                            <input type="text" class="form-control" name="created_by" required>
            
                        </div>
                        <div class="form-group">
                            <label for="date">Created At</label>
                            <input type="date" class="form-control" name="date" required>
            
                        </div>
                        <div class="form-group">
                            <label for="text">Status</label>
                            <select class="form-control" name="status" required>
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                            </select>
                
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="Submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery from a CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

        



