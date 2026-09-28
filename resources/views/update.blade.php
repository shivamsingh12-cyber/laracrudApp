<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User</title>
</head>
<body>
    <form action="{{url('updateUser/'.$user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="fname" value="{{old('fname',$user->fname)}}">
                         @error('fname')
                        <p>{{$message}}</p>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="number" name="age" value="{{old('age',$user->age)}}">
                         @error('age')
                        <p>{{$message}}</p>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    
                   Male <input type="radio" name="gender" value="male" @checked(old('gender',$user->gender)=='male') >
                   Female <input type="radio" name="gender" value="female" @checked(old('gender',$user->gender)=='female')>
                        @error('gender')
                        <p>{{$message}}</p>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Course</td>
                <td>
                    <select name="course" id="">
                        <option value="">Select here</option>
                        <option value="msc" @selected(old('course',$user->course)=='msc')>MSC</option>
                        <option value="csc"@selected(old('course',$user->course)=='csc') >CSC</option>
                        <option value="bsc" @selected(old('course',$user->course)=='bsc') >BSC</option>
                             @error('course')
                        <p>{{$message}}</p>
                    @enderror
                    </select>
                </td>
            </tr>
            <tr>
                <td>City</td>
                <td>
                    Bihar<input type="checkbox" name="city" value="bihar" @checked(old('city',$user->city)=='bihar')>
                   Jharkhand <input type="checkbox" name="city" value="jharkhand" @checked(old('city',$user->city)=='jharkhand')>
                        @error('city')
                        <p>{{$message}}</p>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="image" id=""></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Submit</button></td>
            </tr>
        </table>
    </form>
</body>
</html>