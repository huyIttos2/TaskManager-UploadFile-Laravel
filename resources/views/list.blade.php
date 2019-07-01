<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    @if(!isset($tasks))
        <h5 class="text-primary">Du lieu khong ton tai!</h5>
        @else
        <div class="container" style="margin-top: 25px">
            <divb class="row justify-content-center">
                <div class="col-sm-7">
                    <h3 align="center" class="text-danger" style="margin-bottom: 30px;font-family: Chilanka">TASK LIST</h3>
                    <a class="text-primary" href="{{route('welcome')}}">Back</a>
                    <table class="table table-bordered small" >
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Task Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($tasks) ==0)
                            <tr>
                                <td colspan="5"><h5 class="text-primary">Hien tai chua co tasks nao duoc tao</h5></td>
                            </tr>
                        @else
                            @foreach($tasks as $key => $task)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $task->inputTitle }}</td>
                                    <td>{{ $task->inputContent }}</td>
                                    <td>{{ $task->inputDueDate }}</td>
                                    <td align="center">
                                        <img src="{{ asset('storage/images/'.$task->image) }}" style="width: 55px; height: 60px; border-radius: 50%;">
                                    </td>
                                    <td><a class="text-primary" href="{{route('tasks.delete',$task->id)}}">Delete</a>
                                        <a class="text-dark" href="{{route('tasks.edit',$task->id)}}">Update</a>
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>

            </divb>

        </div>
        @endif
</body>
</html>
