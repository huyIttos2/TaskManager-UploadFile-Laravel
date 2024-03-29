<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-md-4">
            <div class="content">
                <div class="title m-b-md">
                    <p style="color: red;margin-top: 20px" align="center">Add a new task</p>
                </div>
                <div class="error-message">
                    {{--            @if(count($errors)>0)--}}
                    {{--                @foreach($errors->all() as $error)--}}
                    {{--                <p style="color: red">{{$error}}</p>--}}
                    {{--                @endforeach--}}
                    {{--                @endif--}}
                </div>
                <form class="text-left" method="post" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inputTitle">Task title</label>
                        <input type="text"
                               class="form-control"
                               id="inputTitle"
                               name="inputTitle">
                        @if($errors->has('inputTitle'))
                            <p style="color: red">{{$errors->first('inputTitle')}}</p>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="inputContent">Task content</label>
                        <textarea class="form-control"
                                  id="inputContent"
                                  name="inputContent"
                                  rows="3"
                        ></textarea>
                        @if($errors->has('inputContent'))
                            <p style="color: red">{{$errors->first('inputContent')}}</p>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="inputDueDate">Due Date</label>
                        <input type="date"
                               class="form-control"
                               id="inputDueDate"
                               name="inputDueDate"
                        >
                        @if($errors->has('inputDueDate'))
                            <p style="color: red">{{$errors->first('inputDuaDate')}}</p>

                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputFileName">File Name</label>
                        <input type="text"
                               class="form-control"
                               id="inputFileName"
                               name="inputFileName">
                        @if($errors->has('inputFile'))
                            <p style="color: red">{{$errors->first('inputFile')}}</p>
                        @endif
                        <input type="file"
                               class="form-control-file"
                               id="inputFile"
                               name="inputFile">

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <hr>
                <a href="{{ route('welcome') }}">< Back</a>
            </div>
        </div>

    </div>

</div>
</body>
</html>
