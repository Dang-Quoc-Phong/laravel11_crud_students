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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        <h2>Laravel CRUD with Image  <a href="{{route('student.add')}}" class="btn btn-primary float-end">Them moi</a></h2>
                       
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Ten</th>
                                    <th>Email</th>
                                    <th>lop</th>
                                    <th>Anh</th>
                                    <th>Thao tac</th>
                                </thead>
                                <tbody>
                                    @foreach ($students as $sv)
                                        <tr>
                                            <td>{{$sv->id}}</td>
                                            <td>{{$sv->name}}</td>
                                            <td>{{$sv->email}}</td>
                                            <td>{{$sv->class}}</td>
                                            <td> <img src="{{asset('uploads/students/'.$sv->image)}}" width="70px" alt="anh dai dien" height="70px" border-radius="50%"  ></td>
                                            <td>
                                                <form action="{{route('student.delete', $sv->id)}}">
                                                    <a href="{{route('student.edit', $sv->id)}}" class="btn btn-primary">Sua</a>
                                                    @csrf
                                                     @method('DELETE')
                                                     <button type="submit" class="btn btn-danger" onclick="return confirm('Ban co muon xoa {{$sv->name}} khog')">Xoa</button> 
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
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
