<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                <h4 class="alert alert-success">{{session('status')}}</h4>
                    
                @endif
                <div class="card">
                    <div class="card-header">
                        <h2>Update Student with image<a href="{{route('student.all')}}" class="btn btn-danger float-end">Quay lai</a></h2>
                       
                    </div>
                    <div class="card-body">
                              <form action="{{route('student.update', $student->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="form-group mb-3">
                                <label for="">Ho ten:</label>
                                <input type="text" name="name" class="form-control" value="{{$student->name}}">

                            <div class="form-group mb-3">
                                <label for="">Email:</label>
                                <input type="text" name="email" class="form-control"value="{{$student->email}}">

                            <div class="form-group mb-3">
                                <label for="">Lop:</label>
                                <input type="text" name="class" class="form-control"value="{{$student->class}}">

                            <div class="form-group mb-3">
                                <label for="">Anh dai dien:</label>
                                <input type="file" name="image" class="form-control" >
                                <img src="{{asset('uploads/students/'.$student->image)}}" alt="anh dai dien" width="70px" height="70px"/>
                            </div>

                            <div class="form-group mb-3">
                               <button style="submit" class="btn btn-primary">Cap nhat</button>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
