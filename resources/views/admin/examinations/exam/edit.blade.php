<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Exam</title>
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
                    <h1 class="text-center">Add New Exam</h1>
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Exam Name</label>
                            <input type="text" class="form-control" value="{{ $getRecord->name }}" name="name" required placeholder="Exam Name">

                        </div>
                        <div class="form-group">
                            <label>Note</label>
                            <textarea class="form-control" name="note" placeholder="Note">"{{ $getRecord->note }}"</textarea>

                        </div>

                        <button type="submit" class="btn btn-primary btn-block" name="Submit">Update</button>
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