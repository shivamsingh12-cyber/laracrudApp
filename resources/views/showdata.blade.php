<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User</title>
</head>
<body>
  <table>
    <caption><a href="{{url('addform')}}">Add User</a></caption>
    <thead>
        <tr>
            <th>Sr.No</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>City</th>
            <th>Course</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($users))
@php
    $id=1;
@endphp
            @foreach ($users as $user)
                
            
        <tr>
            <td>{{$id++}}</td>
            <td>{{$user->fname}}</td>
            <td>{{$user->age}}</td>
            <td>{{$user->gender}}</td>
            <td>{{$user->city}}</td>
            <td>{{$user->course}}</td>
            <td><img src="{{ asset('storage/images/'.$user->filename) }}" alt="user_image" width="100" height="100"></td>
            <td>
                <form action="{{url('delete/'.$user->id)}}" method="post">
                    @csrf
                    @method('Delete')
                    <button type="submit">Delete</button>
                </form>

                 <form action="{{url('update/'.$user->id)}}" method="get">
                    @csrf
                    <button type="submit">Update</button>
                </form>
            </td>
        </tr>
        @endforeach
        
           @endif
    </tbody>
  </table>
</body>
</html>